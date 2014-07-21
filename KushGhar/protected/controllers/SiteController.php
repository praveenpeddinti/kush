<?php

class SiteController extends Controller {

    /**
     * This is the default action index call our site
    */
    public function actionIndex() {
        $this->session['UserType']='';
        $this->pageTitle="KushGhar-Home";
        $this->render('index');
    }

    /* AboutUs Page */
    public function actionAboutus() {
        $this->pageTitle="KushGhar-About US";
        $this->render('aboutus');
    }

    /* Mission Page */
    public function actionMission() {
        $this->pageTitle="KushGhar-Mission";
        $this->render('mission');
    }

    /* Press Page */
    public function actionPress() {
        $this->pageTitle="KushGhar-Press";
        $this->render('press');
    }

    /* Careers Page */
    public function actionCareers() {
        $this->pageTitle="KushGhar-Careers";
        $this->render('careers');
    }

    /* Privacy & Policy Page */
    public function actionPrivacyPolicy() {
        $this->pageTitle="KushGhar-Privacy Policy";
        $this->render('privacyPolicy');
    }

    /* Terms of Service Page */
    public function actionTermsofService() {
        $this->pageTitle="KushGhar-Terms Of Service";
        $this->render('termsofService');
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
    public function actionLogout() {
        try {
            $this->session->destroy();
            unset ($_SESSION['UserId']);
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
    
    /*public function actionInvite() {
        if(isset($_REQUEST['uname'])){
        //$this->session['UserType'] = "inviteToEmail";
        //$this->session['InviteEmailId'] = $_REQUEST['uname'];
        //error_log("enter splash page======".$this->session['UserType']);
       // 
        }else{
            $this->session->destroy();
            $this->redirect("/site/index");
            
        }
        $this->render('index');
    }*/
    public function actionInviteCust() {
        
        /*if(empty($_REQUEST['uname'])){
           $this->session['UserType'] = ""; 
        }else{
           $this->session['UserType'] = "inviteToCust"; 
        }*/
        $this->session['UserType'] = "inviteToCust";
        //error_log($_REQUEST['uname']."==enter splash page======".$this->session['UserType']);
       // $this->session->destroy();
        $this->pageTitle="KushGhar-Index";
        $this->render('index');
    }
    
    
    /* Cleaning Page */
    public function actionCleaning() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->pageTitle="KushGhar-House Cleaning";
        $this->render('cleaning',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
    /* Car Washing Page */
    public function actionCarwash() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->pageTitle="KushGhar-Car Wash";
        $this->render('carwash',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
    /* Stewards Page */
    public function actionStewards() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->pageTitle="KushGhar-Stewards";
        $this->render('stewards',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
    /* More Services Page */
    public function actionMoreservices() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->pageTitle="KushGhar-More Services";
        $this->render('moreservices',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
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
                
                if(isset ($result)) {
                   if($result->status==1)
                   {
                    $ppp = md5($result->password_hash);
                    $this->session['UserId'] = $result->customer_id;
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] = 'Customer';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
                   }
                   else if ($result->status==0)
                   {
                          $errors = array("LoginForm_error" => 'Your acount is Inactive. Contact your administrator.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                   }
               }
               else{
                   $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
               }
                
                /*if ($result == "false") {
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
                }*/
            }
            $this->pageTitle="KushGhar-Login";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }
    }
    public function actionRegistration() {
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
             $qStringInt=  empty($_REQUEST['Uname'])?' ' : $_REQUEST['Uname'];
             $getInviteUserDetail = $this->kushGharService->getInviteUserDetailWithEmail($qStringInt);
            $this->pageTitle="KushGhar-Registration";
             $this->render('registration', array('model' => $model, 'modelLogin' => $modelLogin, 'modelSample' => $modelSample, 'one' => $qStringInt, 'getInviteUserDetail'=>$getInviteUserDetail));
        }
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
                    $inviteUser = $this->kushGharService->checkNewUserExistInInviteTable($inviteForm->Email);
                    $custUser = $this->kushGharService->checkNewUserExistInCustomerTable($inviteForm->Email);
                    if( ($inviteUser=='No user') && ($custUser=='No user')){
                    $result = $this->kushGharService->getInvitationUser($inviteFriends, $this->session['Type']);
                    }
                    else{
                        $result = 'failure';
//                        $errors = array("InviteForm_error" => 'User Exist.');
//                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors); 
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
                        
                $to1 = $inviteForm->Email;
                $name = $inviteForm->FirstName . ' ' . $inviteForm->LastName;
                $phone = $inviteForm->Phone;
                $location = $inviteForm->Location;
                $subject ='KushGhar Invitation';
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="sendInvitationMailToUser";
                $params1 = array('Logo' => $Logo, 'Name' =>$name);
                 /*
                 * KG Team mail details
                 */
                $to = 'praveen.peddinti@gmail.com';
                //$subject ="Order placed";
                //$Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                //$employerEmail = "no-reply@kushghar.com";
                $messageview="CustomerInvitationMailToKGTeam";
                $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'Phone'=>$phone, 'Location'=>$location);
                
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
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            } else {
                $this->render('invite', array("model" => $inviteForm));
            }
        } else {
            $inviteForm = new InviteForm;
            $getServices = $this->kushGharService->getServices();
            $this->pageTitle="KushGhar-Request Invite";
            $this->renderPartial('inviteRegistration', array("inviteModel" => $inviteForm, "getServices" => $getServices));
        }
    }
    /**
     * Forgot password action method
     */
    public function actionForgot() {
        $modelSample = new SampleForm;
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
            $this->pageTitle="KushGhar-Forgot Password";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }
    }
    /**
     * Displays the login page for vendor
     */
    public function actionVendorLogin() {
        $model = new VendorLoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vendorlogin-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        $errors = array();
        if (isset($_POST['VendorLoginForm'])) {
            $model->attributes = $_POST['VendorLoginForm'];
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => '', 'data' => '', 'error' => $errors);
            } else {
                if($model->VendorType==0){$model->VendorType=2;}
                $result = $this->kushGharService->vendorLogin($model);
                if ($result == "false") {
                    $errors = array("VendorLoginForm_error" => 'Invalid User Id or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $this->session['VendorType'] = $model->VendorType;
                    if($model->VendorType==2){$this->session['UserId'] = $result->vendor_id;}
                    if($model->VendorType==1){$this->session['UserId'] = $result->vendor_id;}
                    
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] ='Vendor';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
                }
            }
            $this->pageTitle="KushGhar-Login";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }
    }

        

    /**
     * User Registration Form Controller START
     */
    public function actionVregistration() {
        $_REQUEST['uname']=$this->session['UserType'];
        //$uname=$this->session['UserType'];
        $inviteForm = new InviteForm;
        $this->session['Type']='Vendor';
        //error_log("id==con==".$_REQUEST['uname']."====".$this->session['Type']);
       
        $model = new VendorRegistrationForm;
        $modelLogin = new VendorLoginForm;
        $request = yii::app()->getRequest();
        $getServices = $this->kushGharService->getServices();
        $formName = $request->getParam('VendorRegistrationForm');
        if ($formName != '') {
            $model->attributes = $request->getParam('VendorRegistrationForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            } else {
                error_log("No errors===" . $model->vendorType);
                if ($model->vendorType == 1) {
                    $Dresult = $this->kushGharService->getcheckVendorForIndividual($model);
                    if ($Dresult == 'No vendor') {error_log("enter controller1======".$model->vendorType);
                        $result = $this->kushGharService->saveVendorForIndividualData($model);
                        error_log("enter controller12======".$model->vendorType);
                        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithEmailIndividual($model->Email);
                        error_log("enter controller13======".$getVendorDetailsType1->vendor_id."====".$model->vendorType);
                        $vendorAddressDetails = $this->kushGharService->saveVendorAddressDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        $vendorDocumentsDetails = $this->kushGharService->saveVendorDocumentsDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        error_log("enter controller14======".$model->vendorType);
                        $this->session['UserId'] = $getVendorDetailsType1->vendor_id;
                        $this->session['VendorType'] = $model->vendorType;
                        //$this->session['Type']='Vendor';
                    }else {
                         $result="fail";
                        $message = array("VendorRegistrationForm_error" => 'Vendor Already Exists.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }

                }
                if ($model->vendorType == 2) {error_log("enter controller2======".$model->vendorType);
                    $Dresult = $this->kushGharService->getcheckVendorForAgency($model);
                    if ($Dresult == 'No vendor') {
                        $result = $this->kushGharService->saveVendorForAgencyData($model);
                        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithEmailAgency($model->Email);
                        $vendorAddressDetails = $this->kushGharService->saveVendorAddressDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        $vendorDocumentsDetails = $this->kushGharService->saveVendorDocumentsDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        error_log("enter controller24======".$model->vendorType);
                        $this->session['UserId'] = $getVendorDetailsType1->vendor_id;
                        $this->session['VendorType'] = $model->vendorType;
                    }else {error_log("dsfsdfsdd=====".$Dresult);
                    $result="fail";
                    $message = array("VendorRegistrationForm_error" => 'Vendor Already Exists.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }
                }
                if ($result == "success") {
                    $message = array("VendorRegistrationForm_error" => 'Registration successfully.');
                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
                } else {
                    $message = array("VendorRegistrationForm_error" => 'Vendor Already Exists.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Registration";
            $this->render('vregistration', array('model' => $model, 'modelLogin' => $modelLogin,'one'=>$_REQUEST['uname'], "inviteModel" => $inviteForm, "getServices"=>$getServices));
        }
    }
    /**
     * Displays the Admin login page
     */
    public function actionAdminLogin() {
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
                $result = $this->kushGharService->login($model, 'Admin');
                if ($result == "false") {
                    $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $ppp = md5($result->password_hash);
                    $this->session['UserId'] = $result->Id;
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] = 'Admin';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->pageTitle="KushGhar-Login";
            $this->render('adminlogin', array('adminLogin' => $model));
        }
    }


}