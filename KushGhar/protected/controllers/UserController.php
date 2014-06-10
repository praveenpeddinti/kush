<?php

class UserController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //$this->layout = 'layout';
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Forgot password action method
     */
    public function actionForgot() {
        $modelSample = new SampleForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'forgot-form') {
            echo CActiveForm::validate($modelSample);
            Yii::app()->end();
        }
        // collect user input data
        $errors = array();
        if (isset($_POST['SampleForm'])) {
            $modelSample->attributes = $_POST['SampleForm'];
            $errors = CActiveForm::validate($modelSample);
            if ($errors != '[]') {
                $obj = array('status' => '', 'data' => '', 'error' => $errors);
            } else {
                $result = $this->kushGharService->getcheckEmailForPassword($modelSample);
                if ($result == "false") {
                    $errors = array("SampleForm_error" => 'Customer does not exist with these details.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $mess = 'Welcome to KushGhar. Your new password is ' . $result->password_salt . "\r\n\n";
                    $to = $result->email_address;
                    $subject = 'Password details';
                    $message = $mess;

                    $this->sendMailToUser($to, '', $subject, $message, 'KushGhar', 'no-reply@kushghar.com', 'PasswordMail');

                    $obj = array('status' => 'success', 'data' => $result, 'error' => 'Password is sent to your mail');
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        $errors = array();
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => '', 'data' => '', 'error' => $errors);
            } else {
                $result = $this->kushGharService->login($model, 'User');
                if ($result == "false") {
                    $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $ppp = md5($result->password_hash);
                    $this->session['UserId'] = $result->customer_id;
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] = 'Customer';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }
    }

    /**
     * User Registration Form Controller START
     */
    public function actionRegistration() {
        $_REQUEST['uname'] = $this->session['UserType'];
        //$_REQUEST['uname']=0;
        //$inviteForm = new InviteForm;\
        
        $this->session['Type'] = 'Customer';

        $model = new RegistrationForm;
        $modelLogin = new LoginForm;
        $modelSample = new SampleForm;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('RegistrationForm');
        //$getServices = $this->kushGharService->getServices();

        if ($formName != '') {
            $model->attributes = $request->getParam('RegistrationForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            } else {
                $Dresult = $this->kushGharService->getcheckUserExist($model);
                if ($Dresult == 'No user') {
                    $result = $this->kushGharService->saveRegistrationData($model);
                    $getUserDetails = $this->kushGharService->getUserDetailsWithEmail($model->Email);
                    $custAddressDetails = $this->kushGharService->saveCustomerAddressDumpInfoDetails($getUserDetails->customer_id);
                    $paymentId = $this->kushGharService->saveCustomerPaymentDumpInfoDetails($getUserDetails->customer_id);
                    $this->session['UserId'] = $getUserDetails->customer_id;
                } else {
                    $result = "failed";
                    $errors = array("RegistrationForm_error" => 'User Already Exists.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                }
                if ($result == "success") {
                    $message = array("RegistrationForm_error" => 'Registration successfully.');
                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
                } else {
                    $message = array("RegistrationForm_error" => 'User Already Exists.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('registration', array('model' => $model, 'modelLogin' => $modelLogin, 'modelSample' => $modelSample, 'one' => $_REQUEST['uname']));
        }
    }

    /**
     * User BaiscInfo Form Controller END
     */
    public function actionBasicinfo() {
        
        $basicForm = new BasicinfoForm;
        $updatedPasswordForm = new updatedPasswordForm;

        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);

        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $this->session['firstName'] = $customerDetails->first_name;
        $Identity = $this->kushGharService->getIdentifyProof();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('BasicinfoForm');
        if ($formName != '') {
            $basicForm->attributes = $request->getParam('BasicinfoForm');
            $errors = CActiveForm::validate($basicForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                if ($this->session['fileName'] == '') {
                    $basicForm->profilePicture = $customerDetails->profilePicture;
                } else {
                    $basicForm->profilePicture = $this->session['fileName'];
                }
                /* if ($this->session['docFileName'] == '') {
                  $basicForm->uIdDocument = $customerDetails->uIdDocument;
                  } else {
                  $basicForm->uIdDocument = $this->session['docFileName'];
                  } */
                $this->session['LoginPic'] = $this->session['fileName'];
                //unset($this->session['fileName']);
                //unset($this->session['docFileName']);
                $result = $this->kushGharService->updateRegistrationData($basicForm, $cId);
                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('basicinfo', array("model" => $basicForm, "IdentityProof" => $Identity, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails, "updatedPassword" => $updatedPasswordForm));
        }
    }

    /**
     * User contactInfo Form Controller END
     */
    public function actionContactInfo() {
        $ContactInfoForm = new ContactInfoForm;
        $cId = $this->session['UserId'];
        $States = $this->kushGharService->getStates();

        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $request = yii::app()->getRequest();
        $formName = $request->getParam('ContactInfoForm');
        $this->session['LoginPic'] = $customerDetails->profilePicture;
        if ($formName != '') {
            $ContactInfoForm->attributes = $request->getParam('ContactInfoForm');
            $errors = CActiveForm::validate($ContactInfoForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                $result1 = $this->kushGharService->updateRegistrationinContactData($ContactInfoForm, $cId);
                $result = $this->kushGharService->saveCustomerInfoDetails($ContactInfoForm, $cId);

                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('contactInfo', array("model" => $ContactInfoForm, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails, "States" => $States));
        }
    }

    /**
     * User Payment Form Controller END
     */
    public function actionPaymentinfo() {
        $paymentForm = new PaymentInfoForm;
        $cId = $this->session['UserId'];

        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $request = yii::app()->getRequest();
        $formName = $request->getParam('PaymentInfoForm');
        if ($formName != '') {
            $paymentForm->attributes = $request->getParam('PaymentInfoForm');
            $errors = CActiveForm::validate($paymentForm);

            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                $result = $this->kushGharService->updateCustomerPaymentData($paymentForm, $cId);
                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('paymentInfo', array("model" => $paymentForm, "customerPaymentDetails" => $customerPaymentDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails));
        }
    }

    /**
     * File Profile picture function
     */
    public function actionFileUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder = $this->findUploadedPath() . '/images/profile/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg", "gif", "png"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 15 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = CJSON::encode($result);
        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME
        $imgArr = explode(".", $fileName);
        $finalImg_name = $result['filename'];
        // creating small image from the Big one...

        try {
            $finalImg_name_new = $this->findUploadedPath() . '/images/profile/' . $finalImg_name;
            $dest = str_replace(' ', '', $finalImg_name_new);
            $_SESSION['oldfilename'] = $finalImg_name_new;
            $img = Yii::app()->simpleImage->load($folder . $result['filename']); // load file from the specified the path...
            $img->resizeToHeight(50); // creating image height to 50...
            $img->save($finalImg_name_new); // saving into the specified path...
            $finalImg_name = '/images/profile/' . $finalImg_name;
            $this->session['fileName'] = $finalImg_name;
            
        } catch (Exception $e) {
            error_log("***********************" . $e->getMessage());
        }
        echo $return; // it's array
    }

     function findUploadedPath() {

        try {
            $path = dirname(__FILE__);
            $pathArray = explode('/', $path);
            $appendPath = "";
            for ($i = count($pathArray) - 3; $i > 0; $i--) {
                $appendPath = "/" . $pathArray[$i] . $appendPath;
            }
            $originalPath = $appendPath;
            
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
        return $originalPath;
    }

    /**
     * Updated Password in Basic info page START
     */
    public function actionUpdatedPsw() {
        $model = new updatedPasswordForm;
        $cId = $this->session['UserId'];
        $request = yii::app()->getRequest();
        $formName = $request->getParam('updatedPasswordForm');
        if ($formName != '') {
            $model->attributes = $request->getParam('updatedPasswordForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                $result = $this->kushGharService->getupdatedPasswordInBasicInfo($model, $cId);
                if ($result == "success") {
                    $message = array("RegistrationForm_error" => 'Password is updated successfully');
                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
                } else {
                    $message = array("RegistrationForm_error" => 'Already User Existed.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('registration', array('model' => $model, 'modelLogin' => $modelLogin, 'modelSample' => $modelSample));
        }
    }

    /**
     * Total Customer Information Controller
     */
    public function actionCustomerDetails() {
        $model = new CustomerDetailsForm;
        $cId = $this->session['UserId'];
        $States = $this->kushGharService->getStates();

        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);

        $request = yii::app()->getRequest();
        $formName = $request->getParam('CustomerDetailsForm');
        if ($formName != '') {
            $model->attributes = $request->getParam('CustomerDetailsForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            } else {
                $model->profilePicture = $this->session['LoginPic'];
                $result1 = $this->kushGharService->updateRegistrationData($model, $cId);
                $result2 = $this->kushGharService->saveCustomerInfoDetails($model, $cId);
                $result = $this->kushGharService->updateCustomerPaymentData($model, $cId);
                $result = "success";
                if ($result == "success") {
                    //$message = array("CustomerDetailsForm_error_em_" => 'Customer updated successfully');
                    $obj = array('status' => 'success', 'data' => '', 'error' => '');
                } else {
                    //$message = array("CustomerDetailsForm_error" => 'Error Message.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => '');
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('customerDetails', array('model' => $model, "States" => $States, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
        }
    }

    public function actionLogout() {
        try {
            $this->session->destroy();
            unset($_SESSION['UserId']);
            $this->redirect("/site/index");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }

    public function actionAccount() {
        try {

            $this->redirect("/user/basicinfo");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }

    public function actionHome() {
        $this->redirect('/site/index');
    }

    public function actionInviteRegistration() {
        if ($_REQUEST) {
            $inviteForm = new InviteForm;
            $request = yii::app()->getRequest();
            $formName = $request->getParam('InviteForm');
            if ($formName != '') {
                $inviteForm->attributes = $request->getParam('InviteForm');
                $errors = CActiveForm::validate($inviteForm);
                if ($errors != '[]') {
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                } else {
                    $result = $this->kushGharService->getInvitationUser($inviteForm, $this->session['Type']);

                    if ($result == "success") {

                        $to = $inviteForm->Email;
                        $name = $inviteForm->FirstName . ' ' . $inviteForm->LastName;
                        $subject = 'KushGhar Invitation';
                        $this->sendMailToUser($to, $name, $subject, '', 'KushGhar', 'no-reply@kushghar.com', 'sendInvitationMailToUser');
                        $obj = array('status' => 'success', 'data' => $result, 'error' => 'Invitation sent Successfully.');
                    } else {
                        $errors = array("InviteForm_error" => 'User already Invited.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                    }
                }
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            } else {
                $this->render('invite', array("model" => $inviteForm));
            }
        } else {
            $inviteForm = new InviteForm;
            $getServices = $this->kushGharService->getServices();
            $this->renderPartial('inviteRegistration', array("inviteModel" => $inviteForm, "getServices" => $getServices));
        }
    }
    
    
    
    /*
     * Services Control actions start
     */
    public function actionHomeService(){error_log("enter Home services controller---------");
        $homeModel = new HomeServiceForm;
        $cId = $this->session['UserId'];
        //$services
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        error_log("size of House===".$customerServicesHouse."===".$customerServicesCar."===".$customerServicesStewards);
        $request = yii::app()->getRequest();
        $formName = $request->getParam('HomeServiceForm');
        if ($formName != '') {error_log("dsfsdfsd");
            $homeModel->attributes = $request->getParam('HomeServiceForm');
            error_log("------".$homeModel->HouseCleaning);
            $errors = CActiveForm::validate($homeModel);
            if ($errors != '[]') {error_log("enter valid=====");
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {error_log("--else----".$homeModel->HouseCleaning ."--CC--".$homeModel->CarCleaning."--SC--".$homeModel->StewardCleaning);
                if(empty($homeModel->HouseCleaning) && empty($homeModel->CarCleaning) && empty($homeModel->StewardCleaning)){
                        $errors = array("HomeServiceForm_error" => 'Please select any Service.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                    //$obj = array('status' => 'error', 'message' => '', 'error' => 'Please select any Service');
                    }else{
                        $HouseCleaning = 0;
                        $CarCleaning=0;
                        $StewardCleaning=0;
                        if(!empty($homeModel->HouseCleaning)){
                            $HouseCleaning = 1;
                        }
                        if (!empty($homeModel->CarCleaning)) {
                            $CarCleaning=1;
                        }
                        if (!empty($homeModel->StewardCleaning)) {
                            $StewardCleaning = 1;
                        }
                        $data='';
                        if(!empty($homeModel->HouseCleaning)){
                            error_log("-----------------------aaaa---1-");
                            $houseModel = new HouseCleaningForm;
                            $getServiceDetails = $this->kushGharService->getDetails($cId);
                            error_log("squarefeets is ===".$getServiceDetails['squarefeets']);
                            $data=$this->renderPartial('services', array('model'=>$houseModel,'getServiceDetails'=>$getServiceDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                        
                        }
                        elseif (!empty($homeModel->CarCleaning)) {
                            error_log("===============car wash ------=========hone\n");
                                $carModel = new CarWashForm;
                                $cId = $this->session['UserId'];
                                 $States = $this->kushGharService->getStates();
                                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                                $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                                error_log("count===multi==".count($getCarWashServiceDetails));
                            $data=$this->renderPartial('carwash', array('model'=>$carModel, "customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                        }elseif (!empty($homeModel->StewardCleaning)) {
                            error_log("-----------------------aaaa---2-");
                            $stewardModel = new StewardCleaningForm;
                            $getServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                            $data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                    error_log("========================2\n");
                            //$data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning), true);
                            
                        }
                        $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
                    }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('homeService', array("homeModel"=>$homeModel,"customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,"HouseService"=>$customerServicesHouse,"CarService"=>$customerServicesCar,"StewardsService"=>$customerServicesStewards));
    
        }
        }
    
    
    public function actionServices(){error_log("enter services controller---------");
        $houseModel = new HouseCleaningForm;
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        error_log("size of House=sub==".$customerServicesHouse."===".$customerServicesCar."===".$customerServicesStewards);
        
        $request = yii::app()->getRequest();
        $formName = $request->getParam('HouseCleaningForm');
        if ($formName != '') {
        $houseModel->attributes = $request->getParam('HouseCleaningForm');
            error_log("---ddd---".$houseModel->HouseCleaning);
            
            $errors = CActiveForm::validate($houseModel);
            if ($errors != '[]') {error_log("enter valid=====");
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
        }else{
            
            //Saving Logic
            $rows = $this->kushGharService->checkingHouseService($cId);
            error_log("service===========".$rows);
            if($rows=='No Service'){error_log("-----------no service----");
            $result = $this->kushGharService->addHouseCleaningService($houseModel, $cId,$rows);
            }else{error_log("-----------Yes service----");
            $result = $this->kushGharService->updateHouseCleaningService($houseModel, $cId,$rows);
            }
            error_log("result===========".$result."type====".$_REQUEST['Type']);
            $HouseCleaning = 0;
            $CarCleaning=0;
            $StewardCleaning=0;
            if(!empty($houseModel->HouseCleaning)){
                $HouseCleaning = 1;
            }
            if (!empty($houseModel->CarCleaning)) {
                $CarCleaning=1;
            }
            if (!empty($houseModel->StewardCleaning)) {
                $StewardCleaning = 1;
            }
            
            if($_REQUEST['Type']=='next'){
                $data='';
                /*if((!empty($houseModel->HouseCleaning))   ){
                    error_log("-----------------------aaaa---1-");
                    $houseModel = new HouseCleaningForm;
                    $data=$this->renderPartial('services', array('model'=>$houseModel,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning), true);
                }
                else*/if (!empty($houseModel->CarCleaning)) {
                    error_log("-----------------------carbeforeenteraaaa---1-".$houseModel->SquareFeets);
                 $carModel = new CarWashForm;
                        //$cId = $this->session['UserId'];
                        $States = $this->kushGharService->getStates();
                        //$customerDetails = $this->kushGharService->getCustomerDetails($cId);
                         $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                    $data=$this->renderPartial('carwash', array('model'=>$carModel, 'customerDetails' => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);

                }elseif (!empty($houseModel->StewardCleaning)) {
                    error_log("-----------------------house cleaning aaaa---2-");
                    $stewardModel = new StewardCleaningForm;
                    error_log("========================1\n");
                    $getServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                    //$cId = $this->session['UserId'];
                    //$customerDetails = $this->kushGharService->getCustomerDetails($cId);
                    //$customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
                    //$customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
                    
                    $data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                    error_log("========================2\n");
                }
                error_log("========================3\n");
                $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
            error_log("========================4\n");
                
                }else{error_log("house clean yes====".$houseModel->HouseCleaning);
                $priceModel = new PriceQuoteForm;
                $cId = $this->session['UserId'];
                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                if( ($customerServicesCar=='Yes Service') && ($houseModel->CarCleaning=='0')){error_log("enter car====".$houseModel->CarCleaning);
                 $rr=$this->kushGharService->getcustomerServicesCarStatus($cId); 
                }
                if( ($customerServicesStewards=='Yes Service') && ($houseModel->StewardCleaning=='0')){error_log("enter Stewards====".$houseModel->StewardCleaning);
                $dd=$this->kushGharService->getcustomerServicesStewardsStatus($cId); 
                error_log($dd."======enter Stewards====".$houseModel->StewardCleaning);
                
                }
                $getServiceDetails = $this->kushGharService->getDetails($cId);
                
                $data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, "getServiceDetails" => $getServiceDetails,'HouseCleaning'=>$houseModel->HouseCleaning,'CarCleaning'=>$houseModel->CarCleaning,'StewardsCleaning'=>$houseModel->StewardCleaning,'PriceFlag'=>'0'), true);
                error_log("house clean 2yes====".$houseModel->HouseCleaning);
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
            }
        }error_log("========================8\n");
        $renderScript = $this->rendering($obj);
        error_log("========================last");
        echo $renderScript;
        }else{
        $this->render('services', array("model"=>$houseModel,"model1"=>$stewardModel,"customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,"HC"=>$HC,"CC"=>$CC,"SC"=>$SC));
        }    
        
    
    }
    /*public function actionServices(){error_log("enter services controller---------");
        $houseModel = new HouseCleaningForm;
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $this->session['firstName'] = $customerDetails->first_name;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('HouseCleaningForm');
       
        if ($formName != '') {
            $houseModel->attributes = $request->getParam('HouseCleaningForm');
            $errors = CActiveForm::validate($houseModel);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                $result = $this->kushGharService->addHouseCleaningService($houseModel, $cId);
                error_log("results==========".$result);
                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
           
           $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
          $this->render('services', array("model"=>$houseModel,"customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
            }
        
    }*/
    
    
    public function actionCarwash(){error_log("enter car services controller---------");
        $houseModel = new CarWashForm;
        $cId = $this->session['UserId'];
        
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        
        $this->session['firstName'] = $customerDetails->first_name;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('CarWashForm');
        if ($formName != '') {
        $houseModel->attributes = $request->getParam('CarWashForm');
            error_log("---Car--");
            
            $errors = CActiveForm::validate($houseModel);
            if ($errors != '[]') {error_log("enter valid=====");
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
        }else{error_log("---Car-else-".$houseModel->TotalCars);
        error_log("request type====".$_REQUEST['Type']);
//                        $cookie_domain = explode(',', $houseModel->MakeOfCar);
//                        error_log("count===e===".count($cookie_domain)."====".$cookie_domain[0]."====".$cookie_domain[1]);
                        $rows = $this->kushGharService->checkingCarService($cId);
                        error_log("Service avabliableCar Washresult===========".$rows);
                        if(($rows=="No Service") || ($rows=="Yes Service")){error_log("enter inser query============");
                        $result = $this->kushGharService->addCarWashService($houseModel, $cId,$_REQUEST['DL']);
                        }error_log("Car Washresult===========".$result."type====".$_REQUEST['Type']);
                        error_log("---Car2--".$houseModel->StewardCleaning);
                        $HouseCleaning = 0;
                        $CarCleaning=0;
                        $StewardCleaning=0;
                        if(!empty($houseModel->HouseCleaning)){
                            $HouseCleaning = 1;
                        }
                        if (!empty($houseModel->CarCleaning)) {
                            $CarCleaning=1;
                        }
                        if (!empty($houseModel->StewardCleaning)) {
                            $StewardCleaning = 1;
                        }
                        /*if($_REQUEST['Type']=='previous'){
                            $data='';
                            error_log("-----------------------aaaa---1-");
                            $houseModel2 = new HouseCleaningForm;
                            $getServiceDetails = $this->kushGharService->getDetails($cId);
                            error_log("----".$HouseCleaning."---".$CarCleaning."------".$StewardCleaning."----------aaaa---12");
                            $data=$this->renderPartial('services', array('model'=>$houseModel2,'getServiceDetails'=>$getServiceDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            error_log("-----------------------aaaa---13-");
                            
                        }else*/ if($_REQUEST['Type']=='next'){
                        $data='';
                        /*if(!empty($houseModel->HouseCleaning)){
                            error_log("-----------------------aaaa---1-");
                            $houseModel = new HouseCleaningForm;
                            $data=$this->renderPartial('services', array('model'=>$houseModel,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning), true);
                        }
                        elseif (!empty($houseModel->CarCleaning)) {
                         $carModel = new CarWashForm;
                            $data=$this->renderPartial('carwash', array('model'=>$carModel), true);
                        }else*/if (!empty($houseModel->StewardCleaning)) {
                            error_log("-----------------------aaaa---2-");
                            $stewardModel = new StewardCleaningForm;
                            $getServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                            //$data=$this->renderPartial('stewards', array('model1'=>$stewardModel), true);
                            $data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            
                        }
                        error_log("========================3\n");
                $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
            error_log("========================4\n");
                        }else{error_log("Car wash yes====".$houseModel->HouseCleaning);
                $data='';
                        $priceModel = new PriceQuoteForm;
                $cId = $this->session['UserId'];
                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                $getServiceDetails = $this->kushGharService->getDetails($cId);
                $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                if( ($customerServicesHouse=='Yes Service') && ($houseModel->HouseCleaning=='0') ){
                 $rr=$this->kushGharService->getcustomerServicesHouseStatus($cId); 
                }
                if( ($customerServicesStewards=='Yes Service') && ($houseModel->StewardCleaning=='0')){
                $dd=$this->kushGharService->getcustomerServicesStewardsStatus($cId); 
               
                }
                
                $data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getServiceDetails'=>$getServiceDetails, 'getCarWashServiceDetails'=>$getCarWashServiceDetails,'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>$houseModel->HouseCleaning, 'CarCleaning'=>$houseModel->CarCleaning, 'StewardsCleaning'=>$houseModel->StewardCleaning,'PriceFlag'=>'0'), true);
                
                //$data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'HouseCleaning'=>$houseModel->HouseCleaning, 'CarCleaning'=>$houseModel->CarCleaning,'StewardsCleaning'=>$houseModel->StewardCleaning,'PriceFlag'=>'0'), true);
                error_log("house clean 2yes====".$houseModel->HouseCleaning);
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
                error_log("========================7\n");
        }
        }error_log("========================8\n");
        $renderScript = $this->rendering($obj);
        error_log("========================last");
        echo $renderScript;
        error_log("========================last");
        } else {
            $this->render('carwash', array("model"=>"$houseModel","customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
        }
        //$this->render('carwash', array("customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
    }
    
    
    
    
    
    public function actionStewards(){error_log("enter Stewards services controller---------");
        $stewardModel = new StewardCleaningForm;
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        $request = yii::app()->getRequest();
        $formName = $request->getParam('StewardCleaningForm');
        $data='';
        if ($formName != '') {
        $stewardModel->attributes = $request->getParam('StewardCleaningForm');
            error_log("---ddd---".$stewardModel->HouseCleaning);
            
            $errors = CActiveForm::validate($stewardModel);
            if ($errors != '[]') {error_log("enter valid=====");
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
        }else{error_log("startTime===".$stewardModel->StartTime."=====".$stewardModel->EndTime);
        
        $date_a = new DateTime($stewardModel->StartTime);
        $date_b = new DateTime($stewardModel->EndTime);
        
        $interval = date_diff($date_a,$date_b);

            error_log("------------------inter-------".round($interval->format('%h:%i:%s')));
            error_log("------------------No of Stewards-------".round($interval->format('%h:%i:%s')));
            //Saving Logic
            $rows = $this->kushGharService->checkingStewardService($cId);
            error_log("service===========".$rows);
            if($rows=='No Service'){error_log("-----------no service----");
            $result = $this->kushGharService->addStewardsCleaningService($stewardModel, $cId);
            }else{error_log("-----------Yes service----");
            $result = $this->kushGharService->updateStewardsCleaningService($stewardModel, $cId);
            }
            
            error_log("result===========".$result."type====".$_REQUEST['Type']);
            $HouseCleaning = 0;
            $CarCleaning=0;
            $StewardCleaning=0;
            if(!empty($stewardModel->HouseCleaning)){
                $HouseCleaning = 1;
            }
            if (!empty($stewardModel->CarCleaning)) {
                $CarCleaning=1;
            }
            if (!empty($stewardModel->StewardCleaning)) {
                $StewardCleaning = 1;
            }
            
            if($_REQUEST['Type']=='next'){
                
                /*if((!empty($houseModel->HouseCleaning))   ){
                    error_log("-----------------------aaaa---1-");
                    $houseModel = new HouseCleaningForm;
                    $data=$this->renderPartial('services', array('model'=>$houseModel,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning), true);
                }
                elseif (!empty($houseModel->CarCleaning)) {
                    error_log("-----------------------carbeforeenteraaaa---1-".$houseModel->SquareFeets);
                 $carModel = new CarWashForm;
                        $cId = $this->session['UserId'];
                        $States = $this->kushGharService->getStates();
                        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                    $data=$this->renderPartial('carwash', array('model'=>$carModel, 'customerDetails' => $customerDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning), true);

                }else*/if (!empty($houseModel->StewardCleaning)) {
                    error_log("--------praveen---------------aaaa---2-");
                    $stewardModel = new StewardCleaningForm;
                    $data=$this->renderPartial('stewards', array('model1'=>$stewardModel), true);

                }
                $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
            }else{error_log("type====".$_REQUEST['Type']);
            error_log("stewards clean 2yes====".$stewardModel->StewardCleaning);
                $priceModel = new PriceQuoteForm;
                $cId = $this->session['UserId'];
                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                $getServiceDetails = $this->kushGharService->getDetails($cId);
                $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                if( ($customerServicesHouse=='Yes Service') && ($stewardModel->HouseCleaning=='0') ){
                $dd=$this->kushGharService->getcustomerServicesHouseStatus($cId); 
                }
                if( ($customerServicesCar=='Yes Service') && ($stewardModel->CarCleaning=='0') ){
                 $rr=$this->kushGharService->getcustomerServicesCarStatus($cId); 
                }
                
                
                
                //$data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>$stewardModel->HouseCleaning, 'CarCleaning'=>$stewardModel->CarCleaning,'PriceFlag'=>'0'), true);
                
                error_log("========================5\n");
                $data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getServiceDetails'=>$getServiceDetails, 'getCarWashServiceDetails'=>$getCarWashServiceDetails,'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>$stewardModel->HouseCleaning, 'CarCleaning'=>$stewardModel->CarCleaning, 'StewardsCleaning'=>$stewardModel->StewardCleaning,'PriceFlag'=>'0'), true);
                //$data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>1, 'CarCleaning'=>1, 'StewardsCleaning'=>1,'PriceFlag'=>'0'), true);
                error_log("========================6\n");
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
                error_log("========================7\n");
            }
        }error_log("========================8\n");
        $renderScript = $this->rendering($obj);
        error_log("========================last");
        echo $renderScript;
        }else{
        $this->render('stewards', array("model1"=>$stewardModel, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
        }    
        
    
    }
    
    /*public function actionStewards(){error_log("enter stewards services controller---------");
        $stewardModel = new StewardCleaningForm;
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $this->session['firstName'] = $customerDetails->first_name;
        /*$request = yii::app()->getRequest();
        $formName = $request->getParam('BasicinfoForm');
        if ($formName != '') {
            $basicForm->attributes = $request->getParam('BasicinfoForm');
            $errors = CActiveForm::validate($basicForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                if ($this->session['fileName'] == '') {
                    $basicForm->profilePicture = $customerDetails->profilePicture;
                } else {
                    $basicForm->profilePicture = $this->session['fileName'];
                }
               
                $this->session['LoginPic'] = $this->session['fileName'];
                $result = $this->kushGharService->updateRegistrationData($basicForm, $cId);
                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('basicinfo', array("model" => $basicForm, "IdentityProof" => $Identity, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails, "updatedPassword" => $updatedPasswordForm));
        }*/
        //$this->render('stewards', array("model"=>$stewardModel, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
    //}
    
    /*
     * Services control actions end
     */
    public function actionPriceQuote(){error_log("enter Price ing Controller---------");
         $priceModel = new PriceQuoteForm;
         $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $getServiceDetails = $this->kushGharService->getDetails($cId);
        error_log("------------ccccc---------".$getServiceDetails['Id']);
        $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
        $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
        //$this->session['firstName'] = $customerDetails->first_name;
        //$data = "praveen";
        //$obj = array('status' => 'success', 'data' => $data, 'error' => '');
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        if($customerServicesHouse=='Yes Service'){$HCleaning='1';}else{$HCleaning='0';}
        if($customerServicesCar=='Yes Service'){$CCleaning='1';}else{$CCleaning='0';}
        if($customerServicesStewards=='Yes Service'){$SCleaning='1';}else{$SCleaning='0';}
        //$renderScript = $this->rendering($obj);
        //echo $renderScript;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('PriceQuoteForm');
        if ($formName != '') {error_log("dfdfddfdfsd====");
            $basicForm->attributes = $request->getParam('PriceQuoteForm');
            $errors = CActiveForm::validate($basicForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                error_log("else====");
               $data = "Praveen";
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
                
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('priceQuote', array("customerDetails" => $customerDetails, "getServiceDetails" => $getServiceDetails, 'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'getCarWashServiceDetails'=>$getCarWashServiceDetails, 'HouseCleaning'=>$HCleaning, 'CarCleaning'=>$CCleaning, 'StewardsCleaning'=>$SCleaning,'PriceFlag'=>'1'));
        }
        //$this->render('priceQuote', array("customerDetails" => $customerDetails, "getServiceDetails" => $getServiceDetails));
    }
    
    
    
    public function actionServiceOrder(){
        error_log("enter service order controller=====");
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        error_log("size price of House===".$customerServicesHouse."===".$customerServicesCar."===".$customerServicesStewards);
        
        $getOrderNumber='';
        if($customerServicesHouse=='Yes Service') {
            $getServiceDetails = $this->kushGharService->getDetails($cId);
            $getOrderNumber = $getServiceDetails['order_number'];
        }
        if($customerServicesCar=='Yes Service') {
            $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
            foreach($getCarWashServiceDetails as $ee){        
                $getOrderNumber = $ee['order_number'];
                
                }
        }
        if($customerServicesStewards=='Yes Service'){
            $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
            $getOrderNumber = $getStewardsServiceDetails['order_number'];
        }
        error_log("====getOrder====".$getOrderNumber);
        $subject = "Place Order";
        $messages = $customerDetails;
        //$this->sendMailToUser('praveen.peddinti@gmail.com', '', $subject, $messages, 'KushGhar', 'no-reply@kushghar.com', 'OrderPlace');
        $data=$this->renderPartial('serviceOrder', array("customerDetails" => $customerDetails, "orderNumber" => $getOrderNumber), true);
        $obj = array('status' => 'success', 'data' => $data, 'error' => '');
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }
}
