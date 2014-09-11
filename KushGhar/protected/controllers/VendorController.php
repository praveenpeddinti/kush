<?php

class VendorController extends Controller {

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
        $this->pageTitle="KushGhar-Home";
        $this->session['Type']=='Vendor';
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
     * Displays the login page
     */
//    public function actionLogin() {
//        $model = new VendorLoginForm;
//        // if it is ajax validation request
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vendorlogin-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//        // collect user input data
//        $errors = array();
//        if (isset($_POST['VendorLoginForm'])) {
//            $model->attributes = $_POST['VendorLoginForm'];
//            $errors = CActiveForm::validate($model);
//            if ($errors != '[]') {
//                $obj = array('status' => '', 'data' => '', 'error' => $errors);
//            } else {
//                if($model->VendorType==0){$model->VendorType=2;}
//                $result = $this->kushGharService->vendorLogin($model);
//                if ($result == "false") {
//                    $errors = array("VendorLoginForm_error" => 'Invalid User Id or Password.');
//                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
//                } else {
//                    $this->session['VendorType'] = $model->VendorType;
//                    if($model->VendorType==2){$this->session['UserId'] = $result->vendor_id;}
//                    if($model->VendorType==1){$this->session['UserId'] = $result->vendor_id;}
//                    
//                    $this->session['email'] = $result->email_address;
//                    $this->session['firstName'] = $result->first_name;
//                    $this->session['LoginPic'] = $result->profilePicture;
//                    $this->session['Type'] ='Vendor';
//                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
//                }
//            }
//            $renderScript = $this->rendering($obj);
//            echo $renderScript;
//        }
//    }

        

    /**
     * User Registration Form Controller START
     */
//    public function actionVregistration() {
//        $_REQUEST['uname']=$this->session['UserType'];
//        //$uname=$this->session['UserType'];
//        $inviteForm = new InviteForm;
//        $this->session['Type']='Vendor';
//        //error_log("id==con==".$_REQUEST['uname']."====".$this->session['Type']);
//       
//        $model = new VendorRegistrationForm;
//        $modelLogin = new VendorLoginForm;
//        $request = yii::app()->getRequest();
//        $getServices = $this->kushGharService->getServices();
//        $formName = $request->getParam('VendorRegistrationForm');
//        if ($formName != '') {
//            $model->attributes = $request->getParam('VendorRegistrationForm');
//            $errors = CActiveForm::validate($model);
//            if ($errors != '[]') {
//                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
//            } else {
//                error_log("No errors===" . $model->vendorType);
//                if ($model->vendorType == 1) {
//                    $Dresult = $this->kushGharService->getcheckVendorForIndividual($model);
//                    if ($Dresult == 'No vendor') {error_log("enter controller1======".$model->vendorType);
//                        $result = $this->kushGharService->saveVendorForIndividualData($model);
//                        error_log("enter controller12======".$model->vendorType);
//                        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithEmailIndividual($model->Email);
//                        error_log("enter controller13======".$getVendorDetailsType1->vendor_id."====".$model->vendorType);
//                        $vendorAddressDetails = $this->kushGharService->saveVendorAddressDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
//                        $vendorDocumentsDetails = $this->kushGharService->saveVendorDocumentsDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
//                        error_log("enter controller14======".$model->vendorType);
//                        $this->session['UserId'] = $getVendorDetailsType1->vendor_id;
//                        $this->session['VendorType'] = $model->vendorType;
//                        //$this->session['Type']='Vendor';
//                    }else {
//                         $result="fail";
//                        $message = array("VendorRegistrationForm_error" => 'Vendor Already Exists.');
//                        $obj = array('status' => 'error', 'data' => '', 'error' => $message);
//                }
//
//                }
//                if ($model->vendorType == 2) {error_log("enter controller2======".$model->vendorType);
//                    $Dresult = $this->kushGharService->getcheckVendorForAgency($model);
//                    if ($Dresult == 'No vendor') {
//                        $result = $this->kushGharService->saveVendorForAgencyData($model);
//                        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithEmailAgency($model->Email);
//                        $vendorAddressDetails = $this->kushGharService->saveVendorAddressDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
//                        $vendorDocumentsDetails = $this->kushGharService->saveVendorDocumentsDumpInfo($getVendorDetailsType1->vendor_id, $model->vendorType);
//                        error_log("enter controller24======".$model->vendorType);
//                        $this->session['UserId'] = $getVendorDetailsType1->vendor_id;
//                        $this->session['VendorType'] = $model->vendorType;
//                    }else {error_log("dsfsdfsdd=====".$Dresult);
//                    $result="fail";
//                    $message = array("VendorRegistrationForm_error" => 'Vendor Already Exists.');
//                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
//                }
//                }
//                if ($result == "success") {
//                    $message = array("VendorRegistrationForm_error" => 'Registration successfully.');
//                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
//                } else {
//                    $message = array("VendorRegistrationForm_error" => 'Vendor Already Exists.');
//                    $obj = array('status' => 'error', 'data' => '', 'error' => $message);
//                }
//            }
//            $renderScript = $this->rendering($obj);
//            echo $renderScript;
//        } else {
//            $this->render('vregistration', array('model' => $model, 'modelLogin' => $modelLogin,'one'=>$_REQUEST['uname'], "inviteModel" => $inviteForm, "getServices"=>$getServices));
//        }
//    }


    /**
     * User BaiscInfo Form Controller 
     */
    public function actionVendorBasicInformation() {
        $basicForm = new VendorBasicInformationForm;
        $updatedPasswordForm = new updatedPasswordForm;
        $Vid = $this->session['UserId'];
        $VType = $this->session['VendorType'];
        $this->session['Type']='Vendor';
        $getServices = $this->kushGharService->getServices();
        $getVendorDocuments = $this->kushGharService->getVendorDocumentsWithIndividual($Vid);
        $getVendorAddress = $this->kushGharService->getVendorAddressDetails($Vid,$VType);
        if($VType==1){
        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithIndividual($Vid);
        }
        if($VType==2){
        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithAgency($Vid);
        
        }
        //$getVendorDocuments = $this->kushGharService->getVendorDocumentsWithIndividual($Vid);
        $Identity = $this->kushGharService->getIdentifyProof();
         $this->session['firstName']=$getVendorDetailsType1->first_name;      
        $request = yii::app()->getRequest();
        $formName = $request->getParam('VendorBasicInformationForm');
        if ($formName != '') {
            $basicForm->attributes = $request->getParam('VendorBasicInformationForm');
            for($i=0;$i<sizeof($basicForm->Services);$i++)
                {error_log("------------".$basicForm->Services[$i]."----");}
           
            $errors = CActiveForm::validate($basicForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                if ($this->session['fileName'] == '') {
                    $basicForm->profilePicture = $getVendorDetailsType1->profilePicture;
                } else {
                    $basicForm->profilePicture = $this->session['fileName'];
                }
                if ($this->session['docFileName'] == '') {
                    $basicForm->uIdDocument = $getVendorDocuments->proof_image_file_location;
                    
                    
                } else {
                    $basicForm->uIdDocument = $this->session['docFileName'];
                }
                if ($this->session['AddrdocFileName'] == '') {
                    $basicForm->AddrPfDocument=$getVendorDocuments->address_image_file_location;
                } else {
                    $basicForm->AddrPfDocument= $this->session['AddrdocFileName'];
                }
                if ($this->session['ClrdocFileName'] == '') {
                    $basicForm->clrPfDocument=$getVendorDocuments->clearance_image_file_location;
                } else {
                    $basicForm->clrPfDocument= $this->session['ClrdocFileName'];
                }
                $this->session['LoginPic']=$this->session['fileName'];
                //unset($this->session['fileName']);
                //unset($this->session['docFileName']);
                //$result = $this->kushGharService->updateRegistrationData($basicForm, $cId);
                error_log("picture====".$this->session['LoginPic']);
                $saveDocuments = $this->kushGharService->updateVendorDocuments($basicForm, $Vid);
                if($VType==1){
                    $result = $this->kushGharService->updateVendorDetailsWithIndividual($basicForm, $Vid);
                }
                if($VType==2){
                    $result = $this->kushGharService->updateVendorDetailsWithAgency($basicForm, $Vid);
        
                }


                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already user existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
            $this->pageTitle="KushGhar-Basic Info";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {error_log("elsepppppppppp");
            //$this->render('basicinfo', array("model" => $basicForm, "IdentityProof" => $Identity, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails, "updatedPassword"=> $updatedPasswordForm));
        //}
        $this->pageTitle="KushGhar-Basic Info";
        $this->render('vendorBasicInformation', array("model" => $basicForm, "IdentityProof" => $Identity, "getVendorDocuments" => $getVendorDocuments, "getVendorDetailsType1" => $getVendorDetailsType1, "getVendorAddress" => $getVendorAddress, "updatedPassword"=> $updatedPasswordForm, "getServices"=>$getServices));
        }
    }


/**
     * User Contact Information Form Controller
     */
    public function actionVendorContactInformation() {error_log("entercontact info====".$this->session['VendorType']."==".$this->session['UserId']);
        error_log("picture=====".$this->session['LoginPic']);
        $contactForm = new VendorContactInformationForm;
        //$updatedPasswordForm = new updatedPasswordForm;
        $Vid = $this->session['UserId'];
        $VType = $this->session['VendorType'];
        $this->session['Type']=='Vendor';
        $States = $this->kushGharService->getStates();
        $getVendorAddress = $this->kushGharService->getVendorAddressDetails($Vid,$VType);
        
        if($VType==1){

        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithIndividual($Vid);
        
        }
        if($VType==2){
        $getVendorDetailsType1 = $this->kushGharService->getVendorDetailsWithAgency($Vid);

        }
        $this->session['LoginPic'] = $getVendorDetailsType1->profilePicture;
        $request = yii::app()->getRequest();
        $formName = $request->getParam('VendorContactInformationForm');
        if ($formName != '') {error_log("enter contact error info====");
            $contactForm->attributes = $request->getParam('VendorContactInformationForm');
            $errors = CActiveForm::validate($contactForm);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                
                if($VType==1){
                    //$result1 = $this->kushGharService->updateVendorDetailsWithIndividualContact($contactForm, $Vid);
                    $result = $this->kushGharService->updateVendorAddressDetails($contactForm, $Vid,$VType);
                }
                if($VType==2){
                    //$result1 = $this->kushGharService->updateVendorDetailsWithAgencyContact($contactForm, $Vid);
                    $result = $this->kushGharService->updateVendorAddressDetails($contactForm, $Vid,$VType);

                }


                if ($result == "success") {
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                } else {
                    $message = Yii::t('translation', 'Already user existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                }
            }
            $this->pageTitle="KushGhar-Contact Info";
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {error_log("elsepppppppppp");
        $this->pageTitle="KushGhar-Contact Info";
            //$this->render('basicinfo', array("model" => $basicForm, "IdentityProof" => $Identity, "customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "customerPaymentDetails" => $customerPaymentDetails, "updatedPassword"=> $updatedPasswordForm));
        //}
        $this->render('vendorContactInformation', array("model" => $contactForm, "getVendorAddress" => $getVendorAddress, "getVendorDetailsType1" => $getVendorDetailsType1, "States"=>$States));
        }
    }
    /**
     * File Profile picture function
     */
    public function actionFileUpload() { error_log("enter uloading====");
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
           error_log("enter uloading====".$finalImg_name);
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
     * Vendor Updated Password in Basic info page START
     */
    public function actionUpdatedPsw() { error_log("enter-------");
        $model = new updatedPasswordForm;
        $VId = $this->session['UserId'];
        $VType = $this->session['VendorType'];
        $request = yii::app()->getRequest();
        $formName = $request->getParam('updatedPasswordForm');
        if ($formName != '') {
            $model->attributes = $request->getParam('updatedPasswordForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {error_log("enter--ele-----");
                if($VType==1){
                    $result = $this->kushGharService->getupdatedPasswordInVendor($model, $VId,$VType);
                }
                if($VType==2){
                    $result = $this->kushGharService->getupdatedPasswordInVendorAgency($model, $VId,$VType);

                }


                //$result = $this->kushGharService->getupdatedPasswordInBasicInfo($model,$cId);
                if ($result == "success") {
                    $message = array("RegistrationForm_error" => 'Password is updated successfully');
                    $obj = array('status' => 'success', 'data' => $message, 'error' => '');
                } else {
                    $message = array("RegistrationForm_error" => 'Already user existed.');
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
            unset($_SESSION['Type']);
            $this->pageTitle="KushGhar-Home";
            $this->redirect("/site/index");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }
    public function actionAccount() {
        try {
            $this->pageTitle="KushGhar-Basic Info";
            $this->redirect("/vendor/vendorBasicInformation");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }
    
    
    
    
    
}


