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
                    $errors = array("SampleForm_error" => 'Customer dostnot exist with these details.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $mess = 'Hi' . "\r\n";
                    $mess = $mess . 'Welcome to KushGhar. Your new password is ' . $result->password_salt . "\r\n\n";
                    $mess = $mess . 'Thanks & Regards,' . "\r\n" . 'KushGhar.';
                    $to = $result->email_address;
                    $subject = 'Password details';
                    $message = $mess;
                    $headers = 'From: praveen.peddinti@gmail.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
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
                $result = $this->kushGharService->login($model);
                if ($result == "false") {
                    $errors = array("LoginForm_error" => 'Invalid User or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $ppp = md5($result->password_hash);
                    $this->session['UserId'] = $result->customer_id;
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
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
        $model = new RegistrationForm;
        $modelLogin = new LoginForm;
        $modelSample = new SampleForm;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('RegistrationForm');
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
                    $errors = array("RegistrationForm_error" => 'Already User Existed.');
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                }
                if ($result == "success") {
                    $message = array("RegistrationForm_error" => 'Registration successfully.');
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
     * User BaiscInfo Form Controller END
     */
    public function actionBasicinfo() {
        error_log("picture=====".$this->session['LoginPic']);
        $basicForm = new BasicinfoForm;
        $updatedPasswordForm = new updatedPasswordForm;
        $cId = $this->session['UserId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
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
                /*if ($this->session['docFileName'] == '') {
                    $basicForm->uIdDocument = $customerDetails->uIdDocument;
                } else {
                    $basicForm->uIdDocument = $this->session['docFileName'];
                }*/
                $this->session['LoginPic']=$this->session['fileName'];
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
            $this->render('basicinfo', array("model" => $basicForm, "IdentityProof" => $Identity, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "updatedPassword"=> $updatedPasswordForm));
        }
    }

    /**
     * User contactInfo Form Controller END
     */
    public function actionContactInfo() {
        error_log("picture=====".$this->session['LoginPic']);
        $ContactInfoForm = new ContactInfoForm;
        $cId = $this->session['UserId'];
        $States = $this->kushGharService->getStates();
        
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cId);
        $request = yii::app()->getRequest();
        $formName = $request->getParam('ContactInfoForm');
        $this->session['LoginPic'] = $customerDetails->profilePicture;
        error_log("picture=====".$this->session['LoginPic']);
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
            $this->render('contactInfo', array("model" => $ContactInfoForm, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "States"=>$States));
        }
    }

    /**
     * User Payment Form Controller END
     */
    public function actionPaymentinfo() {
        $paymentForm = new PaymentInfoForm;
        $cId = $this->session['UserId'];

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
            $this->render('paymentInfo', array("model" => $paymentForm, "customerPaymentDetails" => $customerPaymentDetails));
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

    /**
     * upload customer proof Document--------
     */
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
            $img->resizeToHeight(50); // creating image height to 50...
            $img->save($finalImg_name_new); // saving into the specified path...
            $finalImg_name = '/images/documents/' . $finalImg_name;
            $this->session['docFileName'] = $finalImg_name;
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
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            } else {
                $result = $this->kushGharService->getupdatedPasswordInBasicInfo($model,$cId);
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




    public function actionLogout() {
        try {
            $this->session->destroy();
            unset ($_SESSION['UserId']);
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
}


