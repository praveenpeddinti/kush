<?php

class UserController extends Controller {

    public function init(){
        parent::init();
        if(!isset(Yii::app()->session['UserId']))
        {
            $this->redirect('/');
        }
        
    }
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
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
        $this->pageTitle="KushGhar-Home";
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
//    public function actionForgot() {
//        $modelSample = new SampleForm;
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'forgot-form') {
//            echo CActiveForm::validate($modelSample);
//            Yii::app()->end();
//        }
//        // collect user input data
//        $errors = array();
//        if (isset($_POST['SampleForm'])) {
//            $modelSample->attributes = $_POST['SampleForm'];
//            $errors = CActiveForm::validate($modelSample);
//            if ($errors != '[]') {
//                $obj = array('status' => '', 'data' => '', 'error' => $errors);
//            } else {
//                $result = $this->kushGharService->getcheckEmailForPassword($modelSample);
//                if ($result == "false") {
//                    $errors = array("SampleForm_error" => 'Customer does not exist with these details.');
//                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
//                } else {
//                    $mess = 'Welcome to KushGhar. Your new password is ' . $result->password_salt . "\r\n\n";
//                    $to = $result->email_address;
//                    $subject = 'Password details';
//                    $message = $mess;
//
//                    $this->sendMailToUser($to, '', $subject, $message, 'KushGhar', 'no-reply@kushghar.com', 'PasswordMail');
//
//                    $obj = array('status' => 'success', 'data' => $result, 'error' => 'Password is sent to your mail');
//                }
//            }
//            $renderScript = $this->rendering($obj);
//            echo $renderScript;
//        }
//    }
//    
    
    
    /*if(isset ($userObj)) {
                   if($userObj['active']==1)
                   {
                              $_SESSION['userName']=$userObj['name'];
                              $_SESSION['email']=$userName;
                              $_SESSION['userId']=$userObj['id'];
                              $_SESSION['login']='passed';
                              //$_SESSION['roleId']=$userObj['roleId'];
                              $_SESSION['permissions']=$userMapper->getUsersPermissions($userObj['id']);
                              $_SESSION['roleId']=$userObj['roleId'];
                              $_SESSION['printOption']=$userObj['printOption'];
                              $this->_redirect("/home/index");
                   }
                   else if ($userObj['active']==0)
                   {
                          $this->view->assign ("iuap","Your acount has been blocked. Contact your administrator");
                   }
               }
               else{
                   $this->view->assign ("iuap","Login failed. Enter correct Login Id and Password");
               }*/

    /**
     * Displays the login page
     */
//    public function actionLogin() {
//        $model = new LoginForm;
//        // if it is ajax validation request
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//        // collect user input data
//        $errors = array();
//        if (isset($_POST['LoginForm'])) {
//            $model->attributes = $_POST['LoginForm'];
//            $errors = CActiveForm::validate($model);
//            if ($errors != '[]') {
//                $obj = array('status' => '', 'data' => '', 'error' => $errors);
//            } else {
//                $result = $this->kushGharService->login($model, 'User');
//                
//                if(isset ($result)) {
//                   if($result->status==1)
//                   {
//                    $ppp = md5($result->password_hash);
//                    $this->session['UserId'] = $result->customer_id;
//                    $this->session['email'] = $result->email_address;
//                    $this->session['firstName'] = $result->first_name;
//                    $this->session['LoginPic'] = $result->profilePicture;
//                    $this->session['Type'] = 'Customer';
//                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
//                   }
//                   else if ($result->status==0)
//                   {
//                          $errors = array("LoginForm_error" => 'Your acount is Inactive. Contact your administrator.');
//                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
//                   }
//               }
//               else{
//                   $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
//                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
//               }
//                
//                /*if ($result == "false") {
//                    $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
//                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
//                } else {
//                    $ppp = md5($result->password_hash);
//                    $this->session['UserId'] = $result->customer_id;
//                    $this->session['email'] = $result->email_address;
//                    $this->session['firstName'] = $result->first_name;
//                    $this->session['LoginPic'] = $result->profilePicture;
//                    $this->session['Type'] = 'Customer';
//                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
//                }*/
//            }
//            $renderScript = $this->rendering($obj);
//            echo $renderScript;
//        }
//    }

    /**
     * User Registration Form Controller START
     */
//    public function actionRegistration() {
//        $this->session['Type'] = 'Customer';
//        $model = new RegistrationForm;
//        $modelLogin = new LoginForm;
//        $modelSample = new SampleForm;
//        $request = yii::app()->getRequest();
//        $formName = $request->getParam('RegistrationForm');
//        //$getServices = $this->kushGharService->getServices();
//
//        if ($formName != '') {
//            $model->attributes = $request->getParam('RegistrationForm');
//            $errors = CActiveForm::validate($model);
//            if ($errors != '[]') {
//                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
//            } else {
//                $Dresult = $this->kushGharService->getcheckUserExist($model);
//                if ($Dresult == 'No user') {
//                    $result = $this->kushGharService->saveRegistrationData($model);
//                    $getUserDetails = $this->kushGharService->getUserDetailsWithEmail($model->Email);
//                    $custAddressDetails = $this->kushGharService->saveCustomerAddressDumpInfoDetails($getUserDetails->customer_id);
//                    $paymentId = $this->kushGharService->saveCustomerPaymentDumpInfoDetails($getUserDetails->customer_id);
//                    $this->session['UserId'] = $getUserDetails->customer_id;
//                } else {
//                    $result = "failed";
//                    $errors = array("RegistrationForm_error" => 'User Already Exists.');
//                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
//                }
//                if ($result == "success") {
//                    $message = array("RegistrationForm_error" => 'Registration successfully.');
//                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
//                } else {
//                    $message = array("RegistrationForm_error" => 'User Already Exists.');
//                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
//                }
//            }
//            $renderScript = $this->rendering($obj);
//            echo $renderScript;
//        } else {
//             $qStringInt=  empty($_REQUEST['Uname'])?' ' : $_REQUEST['Uname'];
//             $getInviteUserDetail = $this->kushGharService->getInviteUserDetailWithEmail($qStringInt);
//            $this->render('registration', array('model' => $model, 'modelLogin' => $modelLogin, 'modelSample' => $modelSample, 'one' => $qStringInt, 'getInviteUserDetail'=>$getInviteUserDetail));
//        }
//    }

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
            $this->pageTitle="KushGhar-Basic Info";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Basic Info";
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
            $this->pageTitle="KushGhar-Contact Info";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Contact Info";
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
            $this->pageTitle="KushGhar-Payment Info";
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Payment Info";
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
            $img->resizeToHeight(150); // creating image height to 50...
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
            $this->pageTitle="KushGhar-Registration";
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
            $this->pageTitle="KushGhar-Home";
            $this->redirect("/site/index");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }

    public function actionAccount() {
        try {
            $this->pageTitle="KushGhar-Basic Info";
            $this->redirect("/user/basicinfo");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }

    public function actionHome() {
        $this->pageTitle="KushGhar-Home";
        $this->redirect('/site/index');
    }

//    public function actionInviteRegistration() {
//        if ($_REQUEST) {
//            $inviteForm = new InviteForm;
//            $request = yii::app()->getRequest();
//            $formName = $request->getParam('InviteForm');
//            if ($formName != '') {
//                $inviteForm->attributes = $request->getParam('InviteForm');
//                $errors = CActiveForm::validate($inviteForm);
//                if ($errors != '[]') {
//                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
//                } else {
//                    $result = $this->kushGharService->getInvitationUser($inviteForm, $this->session['Type']);
//
//                    if ($result == "success") {
//
//                        //$to = $inviteForm->Email;
//                        //$name = $inviteForm->FirstName . ' ' . $inviteForm->LastName;
//                        //$name1 = $inviteForm->Email;
//                        //$subject = 'KushGhar Invitation';
//                        //$this->sendMailToUser($to, $name, $subject, '', 'KushGhar', 'no-reply@kushghar.com', 'sendInvitationMailToUser');
//                        //$this->sendMailToUser('no-reply@kushghar.com', $name, $name1, '', 'KushGhar', 'no-reply@kushghar.com', 'CustomerInvitationMailToKGTeam');
//                        
//                        
//                        
//                         /*
//                  * Customer Mail Details
//                  */
//                $to1 = $inviteForm->Email;
//                $name = $inviteForm->FirstName . ' ' . $inviteForm->LastName;
//                $phone = $inviteForm->Phone;
//                $location = $inviteForm->Location;
//                $subject ='KushGhar Invitation';
//                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
//                $employerEmail = "no-reply@kushghar.com";
//                $messageview1="sendInvitationMailToUser";
//                $params1 = array('Logo' => $Logo, 'Name' =>$name);
//                 /*
//                 * KG Team mail details
//                 */
//                $to = 'praveen.peddinti@gmail.com';
//                //$subject ="Order placed";
//                //$Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
//                //$employerEmail = "no-reply@kushghar.com";
//                $messageview="CustomerInvitationMailToKGTeam";
//                $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'Phone'=>$phone, 'Location'=>$location);
//                
//                //$params = '';
//                $sendMailToUser=new CommonUtility;
//                $sendMailToUser->actionSendmail($messageview1,$params1, $subject, $to1,$employerEmail);
//                $mailSendStatusw=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
//                         
//                        
//                        $obj = array('status' => 'success', 'data' => $result, 'error' => 'Invitation sent Successfully.');
//                    } else {
//                        $errors = array("InviteForm_error" => 'User already Invited.');
//                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
//                    }
//                }
//                $renderScript = $this->rendering($obj);
//                echo $renderScript;
//            } else {
//                $this->render('invite', array("model" => $inviteForm));
//            }
//        } else {
//            $inviteForm = new InviteForm;
//            $getServices = $this->kushGharService->getServices();
//            $this->renderPartial('inviteRegistration', array("inviteModel" => $inviteForm, "getServices" => $getServices));
//        }
//    }
    
    /*
     * Services Control actions start
     */
    public function actionHomeService(){
        $homeModel = new HomeServiceForm;
        $cId = $this->session['UserId'];
        //$services
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        $States = $this->kushGharService->getStates();
        //$MakeOfCar = $this->kushGharService->getMakeOfCar();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('HomeServiceForm');
        if ($formName != '') {
            $homeModel->attributes = $request->getParam('HomeServiceForm');
            $errors = CActiveForm::validate($homeModel);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
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
                        }else{
                            $deleteHouseService = $this->kushGharService->deleteHouseService($cId);
                        }
                        if (!empty($homeModel->CarCleaning)) {
                            $CarCleaning=1;
                        }else{
                            $deleteCarService = $this->kushGharService->checkingCarService($cId);
                        }
                        if (!empty($homeModel->StewardCleaning)) {
                            $StewardCleaning = 1;
                        }else{
                            $deleteStewardService = $this->kushGharService->deleteStewardService($cId);
                        }
                        $data='';
                        if(!empty($homeModel->HouseCleaning)){
                            $houseModel = new HouseCleaningForm;
                            $getServiceDetails = $this->kushGharService->getDetails($cId);
                            $data=$this->renderPartial('services', array('model'=>$houseModel, "States" => $States, 'getServiceDetails'=>$getServiceDetails,"customerAddressDetails" => $customerAddressDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                        }
                        elseif (!empty($homeModel->CarCleaning)) {
                                $carModel = new CarWashForm;
                                $cId = $this->session['UserId'];
                                $States = $this->kushGharService->getStates();
                                $MakeOfCar = $this->kushGharService->getMakes();
                                $ModelOfCar = $this->kushGharService->getModels();
                                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                                $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                                if(count($getCarWashServiceDetails)==0){$countCars = 1;}else{$countCars = count($getCarWashServiceDetails);}
                                //$data=$this->renderPartial('carwash', array('model'=>$carModel, "customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                                $renderHtml = $this->renderPartial('sample1', array('States' => $States, 'Make'=>$MakeOfCar, 'Model'=>$ModelOfCar, 'totalCount' => $countCars, "getCarWashServiceDetails" => $getCarWashServiceDetails,), true);
                                
                                //$renderHtml = $this->renderPartial('sample1', array('States' => $States, 'totalCount' => $countCars), true);
                                $data=$this->renderPartial('carwash', array('model'=>$carModel, "States" => $States, "html" => $renderHtml, "customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                                
                                //$this->render('carwash', array("model"=>"$houseModel", "States" => $States, "html" => $renderHtml, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
                        }elseif (!empty($homeModel->StewardCleaning)) {
                            $stewardModel = new StewardCleaningForm;
                            $getServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                            $data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'States' => $States,'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                           //$data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning), true);
                            
                        }
                        $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
                    }
            }
            $this->pageTitle="KushGhar-Services";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Services";
            $this->render('homeService', array("homeModel"=>$homeModel,"customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,"HouseService"=>$customerServicesHouse,"CarService"=>$customerServicesCar,"StewardsService"=>$customerServicesStewards));
    
        }
        }
    
    
    public function actionServices(){
        $houseModel = new HouseCleaningForm;
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
        
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        $States = $this->kushGharService->getStates();
        $MakeOfCar = $this->kushGharService->getMakes();
        $ModelOfCar = $this->kushGharService->getModels();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('HouseCleaningForm');
        if ($formName != '') {
        $houseModel->attributes = $request->getParam('HouseCleaningForm');
                    
            $errors = CActiveForm::validate($houseModel);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
        }else{
             if($_REQUEST['ContactInfo']=='Yes'){
                 $contentUpdate = $this->kushGharService->updateCcontactInfoDetailsByServices($houseModel,$cId);
             }
            //Saving Logic
            $rows = $this->kushGharService->checkingHouseService($cId);
            if($rows=='No Service'){
            $result = $this->kushGharService->addHouseCleaningService($houseModel, $cId,$rows);
            }else{
            $result = $this->kushGharService->updateHouseCleaningService($houseModel, $cId,$rows);
            }
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
                    
                 $carModel = new CarWashForm;
                        //$cId = $this->session['UserId'];
                        
                        //$customerDetails = $this->kushGharService->getCustomerDetails($cId);
                         $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                    //$data=$this->renderPartial('carwash', array('model'=>$carModel, 'customerDetails' => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                    
                    /*
                     * new carwash page without javascript
                     */
                    if(count($getCarWashServiceDetails)==0){$countCars = 1;}else{$countCars = count($getCarWashServiceDetails);}
   $renderHtml = $this->renderPartial('sample1', array('States' => $States, 'Make'=>$MakeOfCar, 'Model'=>$ModelOfCar, 'totalCount' => $countCars, "getCarWashServiceDetails" => $getCarWashServiceDetails,), true);
   $data=$this->renderPartial('carwash', array('model'=>$carModel, "States" => $States, "html" => $renderHtml, "customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                    
                    
                }elseif (!empty($houseModel->StewardCleaning)) {
                    $stewardModel = new StewardCleaningForm;
                    $getServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                    //$cId = $this->session['UserId'];
                    //$customerDetails = $this->kushGharService->getCustomerDetails($cId);
                    $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
                    //$customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);
                    
                    $data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'States' => $States,'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                }
                $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
                
                }else{
                $priceModel = new PriceQuoteForm;
                $cId = $this->session['UserId'];
                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                if( ($customerServicesCar=='Yes Service') && ($houseModel->CarCleaning=='0')){
                 $rr=$this->kushGharService->getcustomerServicesCarStatus($cId); 
                }
                if( ($customerServicesStewards=='Yes Service') && ($houseModel->StewardCleaning=='0')){
                $dd=$this->kushGharService->getcustomerServicesStewardsStatus($cId); 
                
                }
                $getServiceDetails = $this->kushGharService->getDetails($cId);
                
                $data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, "getServiceDetails" => $getServiceDetails,'HouseCleaning'=>$houseModel->HouseCleaning,'CarCleaning'=>$houseModel->CarCleaning,'StewardsCleaning'=>$houseModel->StewardCleaning,'PriceFlag'=>'0'), true);
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
            }
        }
        $this->pageTitle="KushGhar-Services";
        $renderScript = $this->rendering($obj);
        echo $renderScript;
        }else{
            $this->pageTitle="KushGhar-Services";
        $this->render('services', array("model"=>$houseModel,"model1"=>$stewardModel,"customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,"HC"=>$HC,"CC"=>$CC,"SC"=>$SC));
        }    
        
    
    }
    
   public function actionStewards(){
        $stewardModel = new StewardCleaningForm;
        $cId = $this->session['UserId'];
        $States = $this->kushGharService->getStates();
        $MakeOfCar = $this->kushGharService->getMakes();
        $ModelOfCar = $this->kushGharService->getModels();
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
            
            $errors = CActiveForm::validate($stewardModel);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
        }else{
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
            if($_REQUEST['Type']=='Previous'){
                
                            if($CarCleaning==1){
                                $carModel = new CarWashForm;
                           
                           $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                           //$data=$this->renderPartial('carwash', array('model'=>$carModel, 'customerDetails' => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            if(count($getCarWashServiceDetails)==0){$countCars = 1;}else{$countCars = count($getCarWashServiceDetails);}
                            $renderHtml = $this->renderPartial('sample1', array('States' => $States, 'Make'=>$MakeOfCar, 'Model'=>$ModelOfCar, 'totalCount' => $countCars, "getCarWashServiceDetails" => $getCarWashServiceDetails,), true);
                            $data=$this->renderPartial('carwash', array('model'=>$carModel, "States" => $States, "html" => $renderHtml, "customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            }else{
                            $houseModel = new HouseCleaningForm;;
                            $getServiceDetails = $this->kushGharService->getDetails($cId);
                            $data=$this->renderPartial('services', array('model'=>$houseModel,"States" => $States, 'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            }
                            
                            
                            
                            $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
    
    
                            
            }else if($_REQUEST['Type']=='next'){
                //Saving Logic
            $rows = $this->kushGharService->checkingStewardService($cId);
            if($rows=='No Service'){
            $result = $this->kushGharService->addStewardsCleaningService($stewardModel, $cId);
            }else{
            $result = $this->kushGharService->updateStewardsCleaningService($stewardModel, $cId);
            }
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
                    $stewardModel = new StewardCleaningForm;
                    $data=$this->renderPartial('stewards', array('model1'=>$stewardModel), true);

                }
                $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
            }else{
                
             if($_REQUEST['ContactInfo']=='Yes'){
                 $contentUpdate = $this->kushGharService->updateCcontactInfoDetailsByServices($stewardModel,$cId);
             }
                $rows = $this->kushGharService->checkingStewardService($cId);
            if($rows=='No Service'){
            $result = $this->kushGharService->addStewardsCleaningService($stewardModel, $cId);
            }else{
            $result = $this->kushGharService->updateStewardsCleaningService($stewardModel, $cId);
            }
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
                $totalSeats=0;
                foreach($getCarWashServiceDetails as $shampooseats){
                    $totalSeats= $totalSeats+$shampooseats['shampoo_seats'];
                }
                
                
                //$data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>$stewardModel->HouseCleaning, 'CarCleaning'=>$stewardModel->CarCleaning,'PriceFlag'=>'0'), true);
                
                $data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getServiceDetails'=>$getServiceDetails, 'getCarWashServiceDetails'=>$getCarWashServiceDetails,'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>$stewardModel->HouseCleaning, 'CarCleaning'=>$stewardModel->CarCleaning, 'StewardsCleaning'=>$stewardModel->StewardCleaning,'PriceFlag'=>'0','totalSeats'=>$totalSeats), true);
                //$data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>1, 'CarCleaning'=>1, 'StewardsCleaning'=>1,'PriceFlag'=>'0'), true);
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
                
            }
        }
        $this->pageTitle="KushGhar-Services";
        $renderScript = $this->rendering($obj);
        echo $renderScript;
        }else{
            $this->pageTitle="KushGhar-Services";
        $this->render('stewards', array("model1"=>$stewardModel, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
        }    
        
    
    }
    
    /*
     * Services control actions end
     */
    public function actionPriceQuote(){
         $priceModel = new PriceQuoteForm;
         $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $getServiceDetails = $this->kushGharService->getDetails($cId);
        $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
        $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
        $totalSeats=0;
        foreach($getCarWashServiceDetails as $shampooseats){
            
             $totalSeats= $totalSeats+$shampooseats['shampoo_seats'];
            
        }
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
        if ($formName != '') {
            $basicForm->attributes = $request->getParam('PriceQuoteForm');
            $errors = CActiveForm::validate($basicForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                $data = "Praveen";
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
                
            }
            $this->pageTitle="KushGhar-Price Quote";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Price Quote";
            $this->render('priceQuote', array("customerDetails" => $customerDetails, "getServiceDetails" => $getServiceDetails, 'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'getCarWashServiceDetails'=>$getCarWashServiceDetails, 'HouseCleaning'=>$HCleaning, 'CarCleaning'=>$CCleaning, 'StewardsCleaning'=>$SCleaning,'PriceFlag'=>'1','totalSeats'=>$totalSeats));
        }
        //$this->render('priceQuote', array("customerDetails" => $customerDetails, "getServiceDetails" => $getServiceDetails));
    }
    
    
    
    public function actionServiceOrder(){
        $cId = $this->session['UserId'];
        $genOrderNo = '';
        $HOrder='';$COrder='';$SOrder='';
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        $getOrderDetailsMaxParentId = $this->kushGharService->getOrderDetailsMaxParentId();
        $genOrderNo = $getOrderDetailsMaxParentId['id'];
        $storeOrderDetailsOfParent = $this->kushGharService->storeOrderDetailsOfParent($cId);

        $getOrderNumber='';
        $getServiceDetails='0';
        $getStewardsServiceDetails='0';
        $getCarWashServiceDetails='0';
        $getTotalCars ='';
        $totalSeats=0;
        $servicedate='';
        if($customerServicesHouse=='Yes Service') {
            $getServiceDetails = $this->kushGharService->getDetails($cId);
            //$priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * 125);
            //$priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
            $priceAddServices = (($getServiceDetails['window_grills'] + $getServiceDetails['cupboard_cleaning'] + $getServiceDetails['fridge_interior'] + $getServiceDetails['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
            $otherRoomsCost = ($getServiceDetails['other_rooms']*125);
            if( ($getServiceDetails['total_livingRooms']==1) && ($getServiceDetails['total_bedRooms']==1) && ($getServiceDetails['total_bathRooms']==1) || ($getServiceDetails['total_kitchens']==1))
                    {
                    $priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * 125);
                    $priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                    //$totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                    $totalRoomsPrice = $otherRoomsCost+$priceRoom1 + $priceRoom2 ;
                    }else{$LR='';$BedR='';$BathR='';$KR='';
                         if($getServiceDetails['total_livingRooms']>1){
                             $LR = (($getServiceDetails['total_livingRooms']-1)*125);
                         }
                         if($getServiceDetails['total_bedRooms']>1){
                             $BedR = (($getServiceDetails['total_bedRooms']-1)*125);
                         }
                         if($getServiceDetails['total_bathRooms']>1){
                             $BathR = (($getServiceDetails['total_bathRooms']-1)*250);
                         }
                         if($getServiceDetails['total_kitchens']>1){
                             $KR = (($getServiceDetails['total_kitchens']-1)*250);
                         }
                    
                    $priceRoom1  = $LR+$BedR;
                    $priceRoom2 = $BathR+$KR;
                    $totalRoomsPrice = $otherRoomsCost+$priceRoom1 + $priceRoom2 +750;
                    //$totalRoomsPrice = 0 ;  
                    }
                    
                    $totalRoomsPrice+= $priceAddServices;


//            $serviceTaxPrice = (($priceRoom1+$priceRoom2+$priceAddServices)*12.36)/100;
            
            $storeOrderDetailsOfHouse = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],$getServiceDetails['CustId'],$genOrderNo,'1',$totalRoomsPrice,$getServiceDetails['houseservice_start_time']);
            $getOrderDetailsMaxParentIdH = $this->kushGharService->getOrderDetailsMaxParentId();
            $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofHouse($cId,$getOrderDetailsMaxParentIdH['id'],$getOrderDetailsMaxParentIdH['order_number']);
            $getOrderNumber = $getOrderDetailsMaxParentIdH['order_number'];
            $genOrderNo = $genOrderNo+1;
            $HOrder = $genOrderNo;
        }else{$getServiceDetails='0';}
        
        if($customerServicesCar=='Yes Service') {
            
            $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
            foreach($getCarWashServiceDetails as $ee){
                $getTotalCars = $ee['total_cars'];
                $totalSeats= $totalSeats+$ee['shampoo_seats'];
                $servicedate=$ee['carservice_start_time'];
            }
            $totalCPrice=$getTotalCars*500+$totalSeats;
            $storeOrderDetailsOfHouses = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],1,$genOrderNo,'2',$totalCPrice,$servicedate);
            $getOrderDetailsMaxParentIdC = $this->kushGharService->getOrderDetailsMaxParentId();
            
//$getOrderNumber = $getStewardsServiceDetails['order_number'];
            foreach($getCarWashServiceDetails as $ee){
                $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofCar($cId,$getOrderDetailsMaxParentIdC['id'],$getOrderDetailsMaxParentIdC['order_number']);
                $getOrderNumber = $getOrderDetailsMaxParentIdC['order_number'];
                //$getOrderNumber = $ee['order_number'];
                
                }
                $genOrderNo = $genOrderNo+1;
                $COrder = $genOrderNo;
        }else{$getCarWashServiceDetails='0';}
        
        if($customerServicesStewards=='Yes Service'){
            $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
            $totalSPrice = ($getStewardsServiceDetails['service_hours'] * $getStewardsServiceDetails['no_of_stewards'] * 200);
            
            $storeOrderDetailsOfHouses = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],$getStewardsServiceDetails['CustId'],$genOrderNo,'3',$totalSPrice,$getStewardsServiceDetails['start_time']);
            $getOrderDetailsMaxParentIdS = $this->kushGharService->getOrderDetailsMaxParentId();
            $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofStewards($cId,$getOrderDetailsMaxParentIdS['id'],$getOrderDetailsMaxParentIdS['order_number']);
            $getOrderNumber = $getOrderDetailsMaxParentIdS['order_number'];
            //$getOrderNumber = $getStewardsServiceDetails['order_number'];
            $genOrderNo = $genOrderNo+1;
            $SOrder = $genOrderNo;
        }else{$getStewardsServiceDetails='0';}
        //$subject = "Place Order";
        $messages = "The Order Number is <b>".$getOrderNumber."</b>";
        $mess = "The Order Number is <b>".$getOrderNumber."</b>\r\n\n";
        $mess = $mess."Customer Name is ".$customerDetails['first_name']."\r\n\n";
        $mess = $mess."Phone Number is ".$customerDetails['phone']."\r\n\n";
        $messKG = $mess;
        //$this->sendMailToUser($customerDetails['email_address'], '', $subject1, $messages, 'KushGhar', 'no-reply@kushghar.com', 'OrderPlace');
        //$this->sendMailToUser('praveen.peddinti@gmail.com', '', $subject1, $messKG, 'KushGhar', 'no-reply@kushghar.com', 'OrderPlaceToKGTeam');
                 /*
                  * Customer Mail Details
                  */
                $to1 = $customerDetails['email_address'];
                $subject1 =$getOrderNumber." Order placed";
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="orderplacemessage";
                $params1 = array('Logo' => $Logo, "customerDetails" => $customerDetails, 'HouseService'=>$getServiceDetails,'CarService'=>$getCarWashServiceDetails,'StewardService'=>$getStewardsServiceDetails,'getCars'=>$getTotalCars,'HO'=>$HOrder,'CO'=>$COrder,'SO'=>$SOrder);
                 /*
                 * KG Team mail details
                 */
                $to = 'praveen.peddinti@gmail.com';
                $subject ="Order placed";
                //$Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                //$employerEmail = "no-reply@kushghar.com";
                $messageview="orderplacemessagetoKG";
                $params = array('Logo' => $Logo, 'Message' =>$customerDetails, 'HouseService'=>$getServiceDetails,'CarService'=>$getCarWashServiceDetails,'StewardService'=>$getStewardsServiceDetails,'getCars'=>$getTotalCars);
                
                //$params = '';
                $sendMailToUser=new CommonUtility;
                $sendMailToUser->actionSendmail($messageview1,$params1, $subject1, $to1,$employerEmail);
                $mailSendStatus=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
        $data=$this->renderPartial('serviceOrder', array("customerDetails" => $customerDetails, 'HouseService'=>$getServiceDetails,'CarService'=>$getCarWashServiceDetails,'StewardService'=>$getStewardsServiceDetails,'getCars'=>$getTotalCars,'HO'=>$HOrder,'CO'=>$COrder,'SO'=>$SOrder), true);
        $obj = array('status' => 'success', 'data' => $data, 'error' => '');
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }
    
    public function actionOrder() {
        try {
          $cId = $this->session['UserId'];
          $orderDetails = $this->kushGharService->getOrderDetails($cId);
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $customerPaymentDetails = $this->kushGharService->getCustomerPaymentDetails($cId);  
            //$orderDetails = $this->kushGharService->getOrderDetailsinAdmin();
        $this->pageTitle="KushGhar-Order";
        $this->render("order", array("orderDetails" => $orderDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
            //$this->render("order", array("orderDetails" => $orderDetails));
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    
    public function actionNewOrder() {
        try {$cId = $this->session['UserId'];
            if (isset($_GET['userDetails_page'])) {
                
                $totaluser = $this->kushGharService->getTotalOrdersForCustomer($_GET['serviceType'],$_GET['orderNo'],$cId);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getOrderDetailsForCustomer($startLimit, $endLimit,$_GET['serviceType'],$_GET['orderNo'],$cId);
                $renderHtml = $this->renderPartial('newOrder', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    public function actionInviteFriends(){
        $inviteFriends = new InviteForm;
        if ($_REQUEST){
           $request = yii::app()->getRequest();
            $formName = $request->getParam('InviteForm');
            if ($formName != '') {
                $inviteFriends->attributes = $request->getParam('InviteForm');
                $errors = CActiveForm::validate($inviteFriends);
                if ($errors != '[]') {
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                } else {
                    $inviteUser = $this->kushGharService->checkNewUserExistInInviteTable($inviteFriends->Email);
                    $custUser = $this->kushGharService->checkNewUserExistInCustomerTable($inviteFriends->Email);
                    if( ($inviteUser=='No user') && ($custUser=='No user')){
                    $result = $this->kushGharService->getInvitationFriendUser($inviteFriends, $this->session['Type']);
                    }
                    else{
                        $result = 'failure';
                        $errors = array("InviteForm_error" => 'User Exist.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors); 
                    }
                    if ($result == "success") {
                        //$to = $inviteForm->Email;
                        //$name = $inviteForm->FirstName . ' ' . $inviteForm->LastName;
                        //$name1 = $inviteForm->Email;
                        //$subject = 'KushGhar Invitation';
                        //$this->sendMailToUser($to, $name, $subject, '', 'KushGhar', 'no-reply@kushghar.com', 'sendInvitationMailToUser');
                        //$this->sendMailToUser('no-reply@kushghar.com', $name, $name1, '', 'KushGhar', 'no-reply@kushghar.com', 'CustomerInvitationMailToKGTeam');
                         /*
                  * Customer Mail Details
                  */
                $to1 = $inviteFriends->Email;
                $name = $inviteFriends->FirstName . ' ' . $inviteFriends->LastName;
                $phone = $inviteFriends->Phone;
                $city = $inviteFriends->City;
                $location = $inviteFriends->Location;
                $referrer=$inviteFriends->Referrer;
                $subject ='KushGhar Invitation';
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="InvitationMail";
                
                $mess1 = 'http://www.kushghar.com/site/registration?Uname=' . $inviteFriends->Email . "\r\n\n";
                $params1 = array('Logo' => $Logo, 'Name' =>$name, 'Message' =>$mess1);
                //$this->sendMailToUser($to1, $name, $subject, $mess1, 'KushGhar', 'no-reply@kushghar.com', 'InvitationMail');            
                /*
                 * KG Team mail details
                 */
                $to = 'praveen.peddinti@gmail.com';
                //$subject ="Order placed";
                //$Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                //$employerEmail = "no-reply@kushghar.com";
                $messageview="CustomerInvitationMailToKGTeam";
                $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'City' =>$city, 'Phone'=>$phone, 'Location'=>$location);
                //$params = '';
                $sendMailToUser=new CommonUtility;
                $sendMailToUser->actionSendmail($messageview1,$params1, $subject, $to1,$employerEmail);
                $mailSendStatusw=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);

                



                $obj = array('status' => 'success', 'data' => $result, 'error' => 'Invitation sent Successfully.');
                    } else {
                        $errors = array("InviteForm_error" => 'User already Invited.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                    }
                }
                $this->pageTitle="KushGhar-Invite Friends";
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            } else {
                $this->pageTitle="KushGhar-Invite Friends";
                $this->render('invitefriends', array("inviteModel" => $inviteFriends));
            }
        }
        else
        {
            $this->pageTitle="KushGhar-Invite Friends";
        $this->render('invitefriends', array("inviteModel" => $inviteFriends));
        }
    }
   public function actionCarwash(){
        $houseModel = new CarWashForm;
        $cId = $this->session['UserId'];
        $States = $this->kushGharService->getStates();
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
            
            $errors = CActiveForm::validate($houseModel);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
        }else{
                        
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
                        if($_REQUEST['Type']=='Previous'){
                
                            if($HouseCleaning==1){
                                
                            $houseModel1 = new HouseCleaningForm;;
                            $getServiceDetails = $this->kushGharService->getDetails($cId);
                            $data=$this->renderPartial('services', array('model'=>$houseModel1,'States' => $States,'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            }
                            $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
    
    
                            
            }else if($_REQUEST['Type']=='next'){
                $rows = $this->kushGharService->checkingCarService($cId);
                        if(($rows=="No Service") || ($rows=="Yes Service")){
                        $result = $this->kushGharService->addCarWashService($houseModel, $cId,$_REQUEST['DL']);
                        }
                        $data='';
                        if (!empty($houseModel->StewardCleaning)) {
                            $stewardModel = new StewardCleaningForm;
                            $getServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                            //$data=$this->renderPartial('stewards', array('model1'=>$stewardModel), true);
                            $data=$this->renderPartial('stewards', array('model1'=>$stewardModel,'States' => $States, 'getServiceDetails'=>$getServiceDetails, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails,'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                            
                        }
                        $obj = array('status' => 'success', 'data' => $data, 'error' => '','HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning);
    
                        }else{
                            $rows = $this->kushGharService->checkingCarService($cId);
                        if(($rows=="No Service") || ($rows=="Yes Service")){
                        $result = $this->kushGharService->addCarWashService($houseModel, $cId,$_REQUEST['DL']);
                        }
                $data='';
                        $priceModel = new PriceQuoteForm;
                $cId = $this->session['UserId'];
                $customerDetails = $this->kushGharService->getCustomerDetails($cId);
                $getServiceDetails = $this->kushGharService->getDetails($cId);
                $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
                $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
                if( ($customerServicesStewards=='Yes Service') && ($houseModel->StewardCleaning=='0')){
                $dd=$this->kushGharService->getcustomerServicesStewardsStatus($cId); 
               
                }
                $totalSeats=0;
                foreach($getCarWashServiceDetails as $shampooseats){
                    $totalSeats= $totalSeats+$shampooseats['shampoo_seats'];
                }
                $data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, 'getServiceDetails'=>$getServiceDetails, 'getCarWashServiceDetails'=>$getCarWashServiceDetails,'getStewardsServiceDetails'=>$getStewardsServiceDetails, 'HouseCleaning'=>$houseModel->HouseCleaning, 'CarCleaning'=>$houseModel->CarCleaning, 'StewardsCleaning'=>$houseModel->StewardCleaning,'PriceFlag'=>'0','totalSeats'=>$totalSeats), true);
                
                //$data=$this->renderPartial('priceQuote', array("customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'HouseCleaning'=>$houseModel->HouseCleaning, 'CarCleaning'=>$houseModel->CarCleaning,'StewardsCleaning'=>$houseModel->StewardCleaning,'PriceFlag'=>'0'), true);
                $obj = array('status' => 'success', 'data' => $data, 'error' => '');
                
        }
        }
        $renderScript = $this->rendering($obj);
        echo $renderScript;
        } else {
            $renderHtml = $this->renderPartial('sample1', array('States' => $States, 'totalCount' => 2), true);
            $this->render('carwash', array("model"=>"$houseModel", "States" => $States, "html" => $renderHtml, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
        }
        //$this->render('carwash', array("customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails));
    }
    
   public function actionTotalCars(){ 
        try {
                $totalCount = (int)$_POST['TCars'];
                $States = $this->kushGharService->getStates();
                $MakeOfCar = $this->kushGharService->getMakes();
                $ModelOfCar = $this->kushGharService->getModels();
                                //$data=$this->renderPartial('carwash', array('model'=>$carModel, "customerDetails" => $customerDetails, "getCarWashServiceDetails" => $getCarWashServiceDetails, 'States' => $States, 'HouseCleaning'=>$HouseCleaning,'CarCleaning'=>$CarCleaning,'StewardCleaning'=>$StewardCleaning,'PriceFlag'=>'0'), true);
                //$renderHtml = $this->renderPartial('sample1', array('States' => $States, 'totalCount' => $totalCount, "getCarWashServiceDetails" => 0,), true);
                                
                $renderHtml = $this->renderPartial('sample1', array('States' => $States, 'Make' => $MakeOfCar,'Model' => $ModelOfCar, 'totalCount' => $totalCount), true);
                $obj = array('status' => 'success', 'html' => $renderHtml);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
   }
   public function actionOrderCancelManage(){
       $changeUserStatus = $this->kushGharService->cancelUserOrderStatus($_POST['Id']);
       $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
       echo CJSON::encode($obj);
   }
   public function actionOrderReschedule(){
       try{
           $Model = new OrderRescheduleForm;
            $id=$_POST['Id'];
            $getServiceType = $this->kushGharService->getServiceType($id);
            $type=$getServiceType['ServiceId'];
            $getserviceDetails=$this->kushGharService->getServiceDetails($id,$type);
            $renderHtml=  $this->renderPartial('orderreschedule',array("model"=>$Model, "serviceType" => $type,"OrderNumber"=>$id,"getserviceDetails"=>$getserviceDetails),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in Order Re-Scheduling ##########".$ex->getMessage());
        }
   }
   public function actionOrderRescheduleDate() {
       $rescheduleForm = new OrderRescheduleForm;
       $request = yii::app()->getRequest();
       $formName = $request->getParam('OrderRescheduleForm');
       if ($formName != '') {
                $rescheduleForm->attributes = $request->getParam('OrderRescheduleForm');
                $errors = CActiveForm::validate($rescheduleForm);
                if ($errors != '[]') {
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                } else
                {
                    if($_POST['Type']==1)
                        $result = $this->kushGharService->rescheduleHouseCleaning($rescheduleForm->ServiceStartTime,$_POST['OrderNumber']);
                    else if($_POST['Type']==2)
                        $result = $this->kushGharService->rescheduleCarWah($rescheduleForm->ServiceStartTime,$_POST['OrderNumber']);  
                    else if($_POST['Type']==3)
                        $result = $this->kushGharService->rescheduleStewards($rescheduleForm->StartTime,$rescheduleForm->EndTime,$rescheduleForm->DurationHours,$_POST['OrderNumber']);
                    if($result=='success')
                    {
                        //Mailing functionality
                        $obj = array('status' => 'success', 'data' => $result, 'error' => 'Re-Scheduled Successfully.');
                    }
                    else
                    {
                        $errors = array("RescheduleForm_error" => 'Re-Schedule Failed.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                    }
                    $renderScript = $this->rendering($obj);
                echo $renderScript;
                }
            }
            else
            {
                $errors = array("RescheduleForm_error" => 'Re-Schedule Failed.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
   
   /*public function actionMailSendData() {
        try {   
                $cId = $this->session['UserId'];
        $genOrderNo = '';
        $HOrder='';$COrder='';$SOrder='';
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $customerServicesCar = $this->kushGharService->getcustomerServicesCar($cId);
        $customerServicesStewards = $this->kushGharService->getcustomerServicesStewards($cId);
        $getOrderDetailsMaxParentId = $this->kushGharService->getOrderDetailsMaxParentId();
        $genOrderNo = $getOrderDetailsMaxParentId['id'];
        $storeOrderDetailsOfParent = $this->kushGharService->storeOrderDetailsOfParent($cId);

        $getOrderNumber='';
        $getServiceDetails='0';
        $getStewardsServiceDetails='0';
        $getCarWashServiceDetails='0';
        $getTotalCars ='';
        $totalSeats=0;
        if($customerServicesHouse=='Yes Service') {
            $getServiceDetails = $this->kushGharService->getDetails($cId);
            //$priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * 125);
            //$priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
            $priceAddServices = (($getServiceDetails['window_grills'] + $getServiceDetails['cupboard_cleaning'] + $getServiceDetails['fridge_interior'] + $getServiceDetails['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
            if( ($getServiceDetails['total_livingRooms']==1) && ($getServiceDetails['total_bedRooms']==1) && ($getServiceDetails['total_bathRooms']==1) || ($getServiceDetails['total_kitchens']==1))
                    {
                    $priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * 125);
                    $priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
                    //$totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                    $totalRoomsPrice = $priceRoom1 + $priceRoom2 ;
                    }else{$LR='';$BedR='';$BathR='';$KR='';
                         if($getServiceDetails['total_livingRooms']>1){
                             $LR = (($getServiceDetails['total_livingRooms']-1)*125);
                         }
                         if($getServiceDetails['total_bedRooms']>1){
                             $BedR = (($getServiceDetails['total_bedRooms']-1)*125);
                         }
                         if($getServiceDetails['total_bathRooms']>1){
                             $BathR = (($getServiceDetails['total_bathRooms']-1)*250);
                         }
                         if($getServiceDetails['total_kitchens']>1){
                             $KR = (($getServiceDetails['total_kitchens']-1)*250);
                         }
                    
                    $priceRoom1  = $LR+$BedR;
                    $priceRoom2 = $BathR+$KR;
                    $totalRoomsPrice = $priceRoom1 + $priceRoom2 +750;
                    //$totalRoomsPrice = 0 ;  
                    }
                    
                    $totalRoomsPrice+= $priceAddServices;


//            $serviceTaxPrice = (($priceRoom1+$priceRoom2+$priceAddServices)*12.36)/100;
            
            $storeOrderDetailsOfHouse = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],$getServiceDetails['CustId'],$genOrderNo,'1',$totalRoomsPrice);
            $getOrderDetailsMaxParentIdH = $this->kushGharService->getOrderDetailsMaxParentId();
            $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofHouse($cId,$getOrderDetailsMaxParentIdH['id'],$getOrderDetailsMaxParentIdH['order_number']);
            $getOrderNumber = $getOrderDetailsMaxParentIdH['order_number'];
            $genOrderNo = $genOrderNo+1;
            $HOrder = $genOrderNo;
        }else{$getServiceDetails='0';}
        
        if($customerServicesCar=='Yes Service') {
            
            $getCarWashServiceDetails = $this->kushGharService->getCarWashDetails($cId);
            foreach($getCarWashServiceDetails as $ee){
                $getTotalCars = $ee['total_cars'];
                $totalSeats= $totalSeats+$ee['shampoo_seats'];
            }
            $totalCPrice=$getTotalCars*500+$totalSeats;
            $storeOrderDetailsOfHouses = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],$getStewardsServiceDetails['CustId'],$genOrderNo,'2',$totalCPrice);
            $getOrderDetailsMaxParentIdC = $this->kushGharService->getOrderDetailsMaxParentId();
            
            //$getOrderNumber = $getStewardsServiceDetails['order_number'];
            foreach($getCarWashServiceDetails as $ee){
                $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofCar($cId,$getOrderDetailsMaxParentIdC['id'],$getOrderDetailsMaxParentIdC['order_number']);
                $getOrderNumber = $getOrderDetailsMaxParentIdC['order_number'];
                //$getOrderNumber = $ee['order_number'];
                
                }
                $genOrderNo = $genOrderNo+1;
                $COrder = $genOrderNo;
        }else{$getCarWashServiceDetails='0';}
        
        if($customerServicesStewards=='Yes Service'){
            $getStewardsServiceDetails = $this->kushGharService->getStewardsDetails($cId);
            $totalSPrice = ($getStewardsServiceDetails['service_hours'] * $getStewardsServiceDetails['no_of_stewards'] * 200);
            
            $storeOrderDetailsOfHouses = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],$getStewardsServiceDetails['CustId'],$genOrderNo,'3',$totalSPrice);
            $getOrderDetailsMaxParentIdS = $this->kushGharService->getOrderDetailsMaxParentId();
            $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofStewards($cId,$getOrderDetailsMaxParentIdS['id'],$getOrderDetailsMaxParentIdS['order_number']);
            $getOrderNumber = $getOrderDetailsMaxParentIdS['order_number'];
            //$getOrderNumber = $getStewardsServiceDetails['order_number'];
            $genOrderNo = $genOrderNo+1;
            $SOrder = $genOrderNo;
        }else{$getStewardsServiceDetails='0';}
        //$subject = "Place Order";
                  /*
                  * Customer Mail Details
                  */
                /*pra$to1 = $customerDetails['email_address'];
                $subject1 =$getOrderNumber." Order placed";
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="orderplacemessage";
                $params1 = array('Logo' => $Logo, "customerDetails" => $customerDetails, 'HouseService'=>$getServiceDetails,'CarService'=>$getCarWashServiceDetails,'StewardService'=>$getStewardsServiceDetails,'getCars'=>$getTotalCars,'HO'=>$HOrder,'CO'=>$COrder,'SO'=>$SOrder);
                 /*
                 * KG Team mail details
                 */
                /*pra$to = 'praveen.peddinti@gmail.com';
                $subject ="Order placed";
                //$Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                //$employerEmail = "no-reply@kushghar.com";
                $messageview="orderplacemessagetoKG";
                $params = array('Logo' => $Logo, 'Message' =>$customerDetails, 'HouseService'=>$getServiceDetails,'CarService'=>$getCarWashServiceDetails,'StewardService'=>$getStewardsServiceDetails,'getCars'=>$getTotalCars);
                
                //$params = '';
                $sendMailToUser=new CommonUtility;
                $sendMailToUser->actionSendmail($messageview1,$params1, $subject1, $to1,$employerEmail);
                $mailSendStatus=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                $obj = array('status' => 'success');
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }*/
    public function actionOrderReview(){
       try{
           $Model = new OrderReviewForm;
            $id=$_POST['Id'];
            $getServiceType = $this->kushGharService->getServiceType($id);
            $type=$getServiceType['ServiceId'];
            $custId=$getServiceType['CustId'];
            $getReviewExist=$this->kushGharService->getReviewExist($id);
            if($getReviewExist>=1){
                $renderHtml="You have already done your review for this order";
            }else{
            $renderHtml=  $this->renderPartial('orderreview',array("model"=>$Model, "OrderNumber"=>$id,"ServiceType"=>$type,"CustId"=>$custId),true);
            }
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in Order Review/feedback ##########".$ex->getMessage());
        }
   }
   public function actionOrderReviewSave(){
       try{
            $reviewForm = new OrderReviewForm;
            $request = yii::app()->getRequest();
            $formName = $request->getParam('OrderReviewForm');
            if ($formName != '') {
                $reviewForm->attributes = $request->getParam('OrderReviewForm');
                $errors = CActiveForm::validate($reviewForm);
                if ($errors != '[]') {
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                } else
                {
                    $result = $this->kushGharService->reviewSave($reviewForm);
                    if($result=='success')
                    {
                        //Mailing functionality
                        $obj = array('status' => 'success', 'data' => $result, 'error' => 'Re-View saved Successfully.');
                    }
                    else
                    {
                        $errors = array("ReviewForm_error" => 'Re-View saving Failed..,Retry Again.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                    }
                }
            }
            else
            {
                $errors = array("ReviewForm_error" => 'Re-View saving Failed..,Retry Again.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
       } catch (Exception $ex) {
            error_log("####### Exception Occurred in saving Order Review/feedback ##########".$ex->getMessage());
       }
   }
   
   /*
    * get Model details for carwash service page
    */
   public function actionGetModel(){
        try {   
            $makeName = $_POST['MakeId']; 
            $RowNo = $_POST['RowNo']; 
            $ModelDetails = $this->kushGharService->getSelectedCarModels($makeName);
            $renderHtml = $this->renderPartial('getModel', array('ModelDetails' => $ModelDetails, 'RowNo' => $RowNo), true);
            $obj = array('status' => 'success', 'html' => $renderHtml, 'RowNo' => $RowNo);
            $renderScript = $this->rendering($obj);
            echo $renderScript;
            
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
   }
}
