<?php

class SiteController extends Controller {

    /**
     * This is the default action index call our site
    */
    public function actionIndex() {
        $today = date("d-m-Y"); 
        $t="29-10-2014";
        $date1=date_create("2013-03-15");
        $date2=date_create("2013-12-12");
        $diff=date_diff($date1,$date2);
        $rrr=$diff->format("%R%a days");
        if($t==$today){
        error_log($t."--if---date=====".$rrr);}else{
            error_log($t."--else---date=====".$today);
        }
        $this->session['UserType']='';
        $this->pageTitle="KushGhar-Home";
        $getServices = $this->kushGharService->getFeedbacksTotal5();
        $this->render('index',array("getServices"=>$getServices));
        //$this->render('index');
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
    
    /* Customer Feedback Page */
    public function actionCustomerFeedback() {
        $inviteForm = new InviteForm;
        //$getServices = $this->kushGharService->getFeedbacks();
        $this->pageTitle="KushGhar-Customer Feedback";
        //$this->render('customerFeedback',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
        $this->render('customerFeedback',array("inviteModel" => $inviteForm));
    }
    
    public function actionCustomerFeedback1() {
        try {
            if (isset($_GET['getServices_page'])) {
                $inviteForm = new InviteForm;
                $totalFeedbacks = $this->kushGharService->getFeedbackPublished();
                $startLimit = ((int) $_GET['getServices_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                if(count($totalFeedbacks)==0)
                {
                 $obj=  array('status' => 'success', 'html' => 0, 'totalCount' => $totalFeedbacks);
                }
                else
                {
                $getServices = $this->kushGharService->getFeedbacks($startLimit, $endLimit);
                $renderHtml = $this->renderPartial('customerFeedback1', array('getServices' => $getServices, 'totalCount' => $totalFeedbacks), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totalFeedbacks);
               
                }
                 $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    
    public function actionLogin() {
        
        if(!empty($_POST['Id'])){
            $customerDetails = $this->kushGharService->getCustomerDetails($_POST['Id']);
            $result = $this->kushGharService->adminAsCustomerlogin($customerDetails->email_address,$customerDetails->password_salt, 'User');
            $this->session['is_Assumed_By_Admin'] = 1;
            $this->session['UserId'] = $result->customer_id;
            $this->session['email'] = $result->email_address;
            $this->session['firstName'] = $result->first_name;
            $this->session['LoginPic'] = $result->profilePicture;
            $this->session['Type'] = 'Customer';
            $obj = array('status' => 'success', 'data' => $result, 'error' => '');
            $this->pageTitle="KushGhar-Login";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }else{
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
                    $this->session['is_Assumed_By_Admin'] = 0;
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
        }}
    }
    public function actionRegistration() {
//        $this->session['Type'] = 'Customer';
        $model = new RegistrationForm;
        $modelLogin = new LoginForm;
        $modelSample = new SampleForm;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('RegistrationForm');
        //$getServices = $this->kushGharService->getServices();

        if ($formName != '') {
            $this->session['Type'] = 'Customer';
            $model->attributes = $request->getParam('RegistrationForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            } else {
                $Dresult = $this->kushGharService->getcheckUserExist($model);
                if ($Dresult == 'No user') {
                    $result = $this->kushGharService->saveRegistrationData($model);
                    $getUserDetails = $this->kushGharService->getUserDetailsWithEmail($model->Email);
                    $custAddressDetails = $this->kushGharService->saveCustomerAddressDumpInfoDetails($model->Location,$getUserDetails->customer_id);
                    $paymentId = $this->kushGharService->saveCustomerPaymentDumpInfoDetails($getUserDetails->customer_id);
                    $this->session['UserId'] = $getUserDetails->customer_id;
                } else {
                    $result = "failed";
                    $errors = array("RegistrationForm_error" => 'User already exists.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                }
                if ($result == "success") {
                    $message = array("RegistrationForm_error" => 'Registration successfully.');
                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
                } else {
                    $message = array("RegistrationForm_error" => 'User already exists.');
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
                    $result = $this->kushGharService->getInvitationUser($inviteForm, $this->session['Type']);
                    }
                    else{
                        $result = 'failure';
//                        $errors = array("InviteForm_error" => 'User Exist.');
//                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors); 
                    }
                    if ($result == "success") {
                  /*
                  * Customer Mail Details
                  */
                        
                $to1 = $inviteForm->Email;
                $name = $inviteForm->FirstName . ' ' . $inviteForm->LastName;
                $phone = $inviteForm->Phone;
                $city = $inviteForm->City;
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
                $messageview="CustomerInvitationMailToKGTeam";
                $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'City'=>$city, 'Phone'=>$phone, 'Location'=>$location);
                $sendMailToUser=new CommonUtility;
                $sendMailToUser->actionSendmail($messageview1,$params1, $subject, $to1,$employerEmail);
                $mailSendStatusw=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                    $obj = array('status' => 'success', 'data' => $result, 'error' => 'Invitation sent successfully.');
                } else {
                        $errors = array("InviteForm_error" => 'User already invited.');
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
                    $Name=$result->first_name;
                    $to = $result->email_address;
                    $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                    $subject = 'Password details';
                    $message = $mess;
                    $messageview="passwordMail";
                    $employerEmail = "no-reply@kushghar.com";
                    
                    $params = array('Logo' => $Logo, 'Email' =>$to,'Message'=>$message,'Name'=>$Name);
                    $sendMailToUser=new CommonUtility;
                    $sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
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
                if(isset($result)){ 
                if($result->status==1)
                   {
                     $this->session['VendorType'] = $model->VendorType;
                    if($model->VendorType==2){$this->session['UserId'] = $result->vendor_id;}
                    if($model->VendorType==1){$this->session['UserId'] = $result->vendor_id;}
                    
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] ='Vendor';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
                   }
                   else if ($result->status==0)
                   {
                    $errors = array("VendorLoginForm_error" => 'Your acount is Inactive. Contact your administrator.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                   }
                }
                else {
                    $errors = array("VendorLoginForm_error" => 'Invalid User Id or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
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
                if ($model->vendorType == 1) {
                    $Dresult = $this->kushGharService->getcheckVendorForIndividual($model);
                    if ($Dresult == 'No vendor') {
                        $result = $this->kushGharService->saveVendorForIndividualData($model);
                        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithEmailIndividual($model->Email);
                        $vendorAddressDetails = $this->kushGharService->saveVendorAddressDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        $vendorDocumentsDetails = $this->kushGharService->saveVendorDocumentsDumpInfo($getVendorDetailsType1->vendor_id, $model);
                        //$this->session['UserId'] = $getVendorDetailsType1->vendor_id;
                        //$this->session['VendorType'] = $model->vendorType;
                        //$this->session['Type']='Vendor';
                    }else {
                         $result="fail";
                        $message = array("VendorRegistrationForm_error" => 'Vendor already exists.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }

                }
                if ($model->vendorType == 2) {
                    $Dresult = $this->kushGharService->getcheckVendorForAgency($model);
                    if ($Dresult == 'No vendor') {
                        $result = $this->kushGharService->saveVendorForAgencyData($model);
                        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithEmailAgency($model->Email);
                        $vendorAddressDetails = $this->kushGharService->saveVendorAddressDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        $vendorDocumentsDetails = $this->kushGharService->saveVendorDocumentsDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
                        //$this->session['UserId'] = $getVendorDetailsType1->vendor_id;
                        //$this->session['VendorType'] = $model->vendorType;
                    }else {
                    $result="fail";
                    $message = array("VendorRegistrationForm_error" => 'Vendor already exists.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
                }
                }
                if ($result == "success") {
                    $mess = "Welcome to KushGhar."."\r\n Your Credentials are"."\r\n UserID : " . $model->Email . "\r\n Password : ".$model->Password."\r\n\n";
                    $Name=$model->FirstName.' '.$model->LastName;
                    $to = $model->Email;
                    $to1 = 'praveen.peddinti@gmail.com';
                    $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                    $subject = 'Waiting for Approval';
                    $subjectAdmin='New Vendor Registered Details';
                    $messageview="vendorInvitationMail";
                    $messageview1="VendorInvitationMailToKGTeam";
                    $employerEmail = "no-reply@kushghar.com";
                    $params = array('Logo' => $Logo, 'Email' =>$to,'Message'=>$mess,'Name'=>$Name,'password'=>$model->Password);
                    $params1=array('Logo'=>$Logo,'Email'=>$to1,'Name'=>$Name,'EmailID'=>$to,'Phone'=>$model->Phone,'AgencyName'=>$model->AgencyName,'VendorType'=>$model->vendorType);
                    $sendMailToUser=new CommonUtility;
                    $sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                    $sendMailToUser->actionSendmail($messageview1, $params1, $subjectAdmin, $to1, $employerEmail);
                    $message = array("VendorRegistrationForm_error" => 'Registration successfully.');
                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
                } else {
                    $message = array("VendorRegistrationForm_error" => 'Vendor already exists.');
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
        
        if(!empty($_POST['Id'])){
            $adminDetails = $this->kushGharService->getAdminDetails($_POST['Id']);
            $result = $this->kushGharService->adminAsCustomerlogin($adminDetails->email_address,$adminDetails->password_salt, 'Admin');
            $this->session['is_Assumed_By_Admin'] = 0;
            $this->session['UserId'] = $result->Id;
            $this->session['email'] = $result->email_address;
            $this->session['firstName'] = $result->first_name;
            $this->session['LoginPic'] = $result->profilePicture;
            $this->session['Type'] = 'Admin';
            $obj = array('status' => 'success', 'data' => $result, 'error' => '');
            $this->pageTitle="KushGhar-Login";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }else{
        
        
        
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
                if(isset($result)) {
                   
                    $ppp = md5($result->password_hash);
                    $this->session['is_Assumed_By_Admin'] = 0;
                    $this->session['UserId'] = $result->Id;
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] = 'Admin';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
               }
               else{
                   $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
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
public function actionDocUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder = $this->findUploadedPath() . '/images/documents/'; // folder for uploaded files
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
            $finalImg_name_new = $this->findUploadedPath() . '/images/documents/' . $finalImg_name;
            $dest = str_replace(' ', '', $finalImg_name_new);
            $_SESSION['oldfilename'] = $finalImg_name_new;
            $img = Yii::app()->simpleImage->load($folder . $result['filename']); // load file from the specified the path...
            //$img->resizeToHeight(150); // creating image height to 50...
            $img->save($finalImg_name_new); // saving into the specified path...
            $finalImg_name = '/images/documents/' . $finalImg_name;
            $proofType=Yii::app()->getRequest()->getQuery('proof');
            if($proofType=='Identity')
                $this->session['docFileName'] = $finalImg_name;
            if($proofType=='Address')
                $this->session['AddrdocFileName'] = $finalImg_name;
            if($proofType=='Clearance')
                $this->session['ClrdocFileName'] = $finalImg_name;
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
            error_log("--------------" . $originalPath);
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
        return $originalPath;
    }
    
    /**
     * This is the default action index call our site
    */
    public function actionCronjobs() {
        
        $orderDetails = $this->kushGharService->getOrderDetailsCronJob();
                
        //error_log("---------".print_r($orderDetails,true));
        foreach($orderDetails as $rows){
            $today = date("d-m-Y");
            $service_date=$rows['Servicedate'];
            $date1=date_create("$today");
            $date2=date_create("$service_date");
            $diff=date_diff($date2,$date1);
            $rrr=(int)$diff->format("%R%a");
            if($rrr==30){
            error_log("------------if--------".$rows['email_address']."-------$rrr");
            }else{
                error_log("----------else----------".$rows['email_address']."-------$rrr");
            }
        }
        /*$today = date("d-m-Y"); 
        $t="29-10-2014";
        $date1=date_create("2013-03-15");
        $date2=date_create("2013-12-12");
        $diff=date_diff($date1,$date2);
        $rrr=$diff->format("%R%a days");
        if($t==$today){
        error_log($t."--if---date=ggg====".$rrr);}else{
            error_log($t."--else---dateggg=====".$today);
        }*/
        
    }

}