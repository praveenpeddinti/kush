<?php

class AdminController extends Controller {

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
        $this->pageTitle="KushGhar-Index";
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
     * Displays the Admin login page
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
//                $result = $this->kushGharService->login($model, 'Admin');
//                if ($result == "false") {
//                    $errors = array("LoginForm_error" => 'Invalid User Id or Password.');
//                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
//                } else {
//                    $ppp = md5($result->password_hash);
//                    $this->session['UserId'] = $result->Id;
//                    $this->session['email'] = $result->email_address;
//                    $this->session['firstName'] = $result->first_name;
//                    $this->session['LoginPic'] = $result->profilePicture;
//                    $this->session['Type'] = 'Admin';
//                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
//                }
//            }
//            $renderScript = $this->rendering($obj);
//            echo $renderScript;
//        } else {
//            $this->render('login', array('adminLogin' => $model));
//        }
//    }

    public function actionDashboard() {
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
                        $result = "failure";
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
                $location = $inviteFriends->Location;
                $subject ='KushGhar Invitation';
               
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="InvitationMail";
                //$params1 = array('Logo' => $Logo, 'Name' =>$name, 'Referrer'=>$referrer);
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
                $this->pageTitle="KushGhar-Dashboard";
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            } else {
                $this->pageTitle="KushGhar-Dashboard";
                $this->render('dashboard', array("inviteModel" => $inviteFriends));
            }
        }
        else
        {
            $this->pageTitle="KushGhar-Dashboard";
        $this->render('dashboard', array("inviteModel" => $inviteFriends));
        }
    }

    public function actionManage() {
        try {
            $this->pageTitle="KushGhar-Invite Management";
            $this->render("manage");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    
    public function actionNewManage() {
        try {
            if (isset($_GET['userDetails_page'])) {
                $model = new BulkForm;
                $totaluser = $this->kushGharService->getTotalUsers($_GET['uname'],$_GET['phone'],$_GET['status']);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                if(count($totaluser)==0)
                {
                 $obj=  array('status' => 'success', 'html' => 0, 'totalCount' => $totaluser);
                }
                else
                {
                $userDetails = $this->kushGharService->getAllUsers($startLimit, $endLimit,$_GET['uname'],$_GET['phone'],$_GET['status']);
                $renderHtml = $this->renderPartial('newManage', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
               
                }
                 $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }

    public function actionManageStatus() {
        $changeUserStatus = $this->kushGharService->getStatusUser($_POST['Id'], $_POST['status']);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }

    public function actionInviteStatus() {
        $email = $_POST['email'];
        
        //$mess1 = 'http://www.kushghar.com/user/registration?Uname=' . $email . "\r\n\n";
        $mess1 = 'http://www.kushghar.com/site/registration?Uname=' . $email . "\r\n\n";
        $changeUserStatus = $this->kushGharService->sendInviteMailToUser($_POST['Id'], $_POST['status']);
        $to = $_POST['email'];
        $subject ="KushGhar Invitation";
        $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
        $employerEmail = "no-reply@kushghar.com";
        $messageview="InvitationMail";
        $params = array('Logo' => $Logo, 'Message' =>$mess1);
                
                //$params = '';
                 $sendMailToUser=new CommonUtility;
                 $sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                
        
        
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
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
    
    public function actionOrder() {
        try {
            
            //$orderDetails = $this->kushGharService->getOrderDetailsinAdmin();
            $this->pageTitle="KushGhar-Orders";
        $this->render("order");
            //$this->render("order", array("orderDetails" => $orderDetails));
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    
    public function actionNewOrder() {
        try {
            if (isset($_GET['userDetails_page'])) {
                $totaluser = $this->kushGharService->getTotalOrders($_GET['serviceType'],$_GET['orderNo'],$_GET['status']);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getOrderDetailsinAdmin($startLimit, $endLimit,$_GET['serviceType'],$_GET['orderNo'],$_GET['status']);
                $renderHtml = $this->renderPartial('newOrder', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    
    public function actionOrderStatus() {
        if($_POST['value']=='Open'){$status = 0;}
        if($_POST['value']=='Schedule'){$status = 1;}
        if($_POST['value']=='Cancel'){$status = 2;}
        if($_POST['value']=='Close'){$status=3;}
        $changeUserStatus = $this->kushGharService->sendorderStatus($_POST['Id'], $status);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }
    
        
    
    public function actionViewData() {
        try {
                         
                if($_POST['ServiceId']==1){
                $servicedetails = $this->kushGharService->getOrderHServicesDetails($_POST['Id']);
                $CustId = $servicedetails['CustId'];
                }
                if($_POST['ServiceId']==2){
                $servicedetails = $this->kushGharService->getOrderCServicesDetails($_POST['Id']);
                foreach($servicedetails as $ee){
                $CustId = $ee['CustId'];
                
            }
                }
                if($_POST['ServiceId']==3){
                $servicedetails = $this->kushGharService->getOrderSServicesDetails($_POST['Id']);
                $CustId = $servicedetails['CustId'];
                }
                $customerDetails = $this->kushGharService->getCustomerDetails($CustId);
                $renderHtml = $this->renderPartial('viewData', array('userDetails1' => $customerDetails,'services'=>$servicedetails,'serviceId'=>$_POST['ServiceId']), true);
                $obj = array('status' => 'success', 'html' => $renderHtml);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
   public function actionUserManagement(){
        try{
            $this->pageTitle="KushGhar-User Management";
            $this->render("usermanagement");
        } catch (Exception $ex) {
            error_log("#######Exception Occured#######". $ex->getMessage());
        }
    }
    public function actionNewUserManage(){
        try {           
                if (isset($_GET['userDetails_page'])) {
                $totaluser = $this->kushGharService->getRegisteredUser($_GET['uname'],$_GET['location'],$_GET['status']);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllRegisteredUsers($startLimit, $endLimit,$_GET['uname'],$_GET['location'],$_GET['status']);
                $renderHtml = $this->renderPartial('newusermanage', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
    }
    public function actionChangeStatus() {
        $changeUserStatus = $this->kushGharService->ChangeStatusUser($_POST['Id'], $_POST['status']);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }
    public function actionGetFullDetails(){
        try{
            $id=$_POST['Id'];
            $userAllDetails=$this->kushGharService->getFullUserDetails($id);
            $renderHtml=  $this->renderPartial('getfulldetails',array('userAllDetails'=> $userAllDetails),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in fetching full details ##########".$ex->getMessage());
        }
    }

    public function actionVendorManagement(){
        try{
            $this->pageTitle="KushGhar-Vendor Management";
            $this->render("vendormanagement");
        } catch (Exception $ex) {
            error_log("#######Exception Occured#######". $ex->getMessage());
        }
    }
 public function  actionNewVendorManage(){
     try{
         if (isset($_GET['userDetails_page'])) {
                $totaluser = $this->kushGharService->getRegisteredVendorUser($_GET['uname'],$_GET['location'],$_GET['status']);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllRegisteredVendorUsers($startLimit, $endLimit,$_GET['uname'],$_GET['location'],$_GET['status']);
                $renderHtml = $this->renderPartial('newvendormanage', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
         }
     } catch (Exception $ex) {
         error_log("######### Exception Occurred##########".$ex->getMessage());
     }
 }
 public function actionChangeVendorStatus() {
        $changeUserStatus = $this->kushGharService->ChangeVendorStatus($_POST['Id'], $_POST['status']);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }
 public function actionVendorAgencyManage(){
     try{
         if (isset($_GET['userDetails_page'])) {
                $totaluser = $this->kushGharService->getRegisteredAgencyVendorUser($_GET['uname'],$_GET['location'],$_GET['status']);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllRegisteredAgencyVendorUsers($startLimit, $endLimit,$_GET['uname'],$_GET['location'],$_GET['status']);
                $renderHtml = $this->renderPartial('vendoragencymanage', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
         }
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
    }
    public function actionChangeAgencyStatus() {
        $changeUserStatus = $this->kushGharService->ChangeAgencyStatus($_POST['Id'], $_POST['status']);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }
    public function actionReviews() {
        try {
            $this->pageTitle="KushGhar-Reviews";
            $this->render("reviews");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    public function actionNewReviews(){
        try {           
                if (isset($_GET['userDetails_page'])) {
                $totaluser = $this->kushGharService->getUserReviews();
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllUsersReviews($startLimit, $endLimit);
                $renderHtml = $this->renderPartial('newreviews', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
    }
    public function actionDownloadCSVFile(){
        $folder = $this->findUploadedPath();
        $file = $folder . '/sampleDownloadFiles/sampleCSV.csv';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }
    public function findUploadedPath() {
        try {
            $path = dirname(__FILE__);
            $pathArray = explode('\\', $path);
            $appendPath = "";
            for ($i = count($pathArray) - 3; $i > 0; $i--) {
            $appendPath = "/" . $pathArray[$i] . $appendPath;
        }
        $originalPath = $appendPath;
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########".$ex->getMessage());
        }
        return $originalPath;
    }
    public function actionFileUpload(){
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $error="\n";
        $folder = $this->findUploadedPath() . '/sampleDownloadFiles/UploadFiles/'; // folder for uploaded files
        $allowedExtensions = array("csv"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 15 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = CJSON::encode($result);
        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME
        try {
            $folder=$folder.$fileName;
            if (NULL!=(fopen($folder, 'r')) ){
                $fileuploadpath = $this->findUploadedPath();
                $dest = $fileuploadpath . '/sampleDownloadFiles/UploadFiles/' . $fileName;
                $col = 0;
                $csvFile = file($dest);
                $i = 0;
                $status = "success";
                if(sizeof($csvFile)>1){
                    foreach ($csvFile as $key => $line) {
                        if ($key >= 1) {
                              $var = explode(",", $line);
                            if (count($var) <= 1) {
                                $error.="Delimiter mismatch! => ".$line;
                            } else {
                                if ($var[0] != "" && $var[1] != "" && $var[2] != "" && $var[3] != "") {
                                    $inviteUser = $this->kushGharService->checkNewUserExistInInviteTable($var[3]);
                                    $custUser = $this->kushGharService->checkNewUserExistInCustomerTable($var[3]);
                                    if( ($inviteUser=='No user') && ($custUser=='No user')){
                                        $resultObject = $this->setUserBeanObject($var);
                                        $result = $this->kushGharService->getInvitationFriendUser($resultObject, $this->session['Type']);
                                    }
                                    else{
                                        $result = 'failure';
                                    }
                                    if ($result == "success") {
                                        /** Customer Mail Details*/
                                        $to1 = $var[3];
                                        $name = $var[0] . ' ' . $var[1];
                                        $phone = $var[2];
                                        $location = $var[3];
                                        $subject ='KushGhar Invitation';
                                        $Logo = YII::app()->params['SERVER_URL'] ."/images/color_logo.png";
                                        $employerEmail = "no-reply@kushghar.com";
                                        $messageview1="InvitationMail";
                                        $mess1 = 'http://www.kushghar.com/site/registration?Uname=' . $var[3] . "\r\n\n";
                                        $params1 = array('Logo' => $Logo, 'Name' =>$name, 'Message' =>$mess1);
                                        //$this->sendMailToUser($to1, $name, $subject, $mess1,'KushGhar', 'no-reply@kushghar.com', 'InvitationMail');            
                                        /** KG Team mail details*/
                                        $to = 'praveen.peddinti@gmail.com';
                                        $messageview="CustomerInvitationMailToKGTeam";
                                        $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'Phone'=>$phone, 'Location'=>$location);
                                        //$sendMailToUser=new CommonUtility;
                                        //$sendMailToUser->actionSendmail($messageview1,$params1, $subject, $to1,$employerEmail);
                                        //$mailSendStatusw=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                                        $error.="User Invited Successfully->".$var[3]."\n";                                        
                                    } else {
                                        $error.="User Already invited ->".$var[3]."\n";
                                    }
                                } else {
                                    $error.="Sorry,Column did not match! ->".$line;
                                }
                            }
                        }
                          $i++;
                    }
                    }else{
                        $error.="Sorry, File format is wrong....";
                    }
                if ($dest != "") {
                    if (file_exists($dest)) {
                        unlink($dest);
                    }
                }
            }
        } catch (Exception $e) {
            error_log("***********************" . $e->getMessage());
        }
        error_log($error);
        $errors = array("InviteForm_error" => $error);
        error_log("Errors=======".print_r($errors, true));
        $obj = array('status' => 'success', 'error' => $errors);
        error_log("Errors=======".print_r($obj, true));
        $renderScript = $this->rendering($obj);
        echo $renderScript; // it's array
    }
    public function setUserBeanObject($var){
        $model = new InviteForm();
        $model->FirstName=$var[0];
        $model->LastName=$var[1];
        $model->Phone=$var[2];
        $model->Email=$var[3];
        $model->Location=$var[4];
        return $model;
    }
    public function actionOrdercanceldetails() {
       
        try{
           $Model = new OrderForm;
            $id=$_POST['Id'];
            $renderHtml=  $this->renderPartial('ordercanceldetails',array("model"=>$Model,"OrderNumber"=>$id),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in Order Re-Scheduling ##########".$ex->getMessage());
        }
    }
    
    public function actionOrdercancelstatus() {
       $orderCancelStatusWithHoursForm = new OrderForm;
       $request = yii::app()->getRequest();
       $formName = $request->getParam('OrderForm');
       if ($formName != '') {
                $orderCancelStatusWithHoursForm->attributes = $request->getParam('OrderForm');
                $errors = CActiveForm::validate($orderCancelStatusWithHoursForm);
                if ($errors != '[]') {
                    $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                } else
                {   $result = $this->kushGharService->sendorderStatusWithTimeAndPeople($orderCancelStatusWithHoursForm, 3);
                    if($result=='success')
                    {
                        //Mailing functionality
                        $obj = array('status' => 'success', 'data' => $result, 'error' => 'Service Status is changed Successfully.');
                    }
                    else
                    {
                        $errors = array("OrderForm_error" => 'Service Failed.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
                    }
                    $renderScript = $this->rendering($obj);
                echo $renderScript;
                }
            }
            else
            {
                $errors = array("OrderForm_error" => 'Service Failed.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
        /*
         * @Praveen feedback is published in the home page when the check the is publish checkbox in User review/feedback tab in admin side
         */
        public function actionFeedbackPublish() {
        $value=$_POST['value'];    
        $changeReviewStatus = $this->kushGharService->getIspublishReview($_POST['Id'], $_POST['value']);
        $obj = array('status' => 'error', 'data' => $value, 'error' => $changeReviewStatus);
        echo CJSON::encode($obj);
    }
    public function  actionGetVendorFullDetails(){
        try{
            $id=$_POST['Id'];
            $userAllDetails=$this->kushGharService->getFullVendorDetails($id);
            $renderHtml=  $this->renderPartial('getfulldetails',array('userAllDetails'=> $userAllDetails),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in fetching full details ##########".$ex->getMessage());
        }
    }
//    public function actionOrderSchedule(){
//         try{
//            $id=$_POST['Id'];
//            $this->pageTitle="KushGhar-Admin Order Schedule";
//            $vendors=$this->kushGharService->getAllVendors();
//            $OrderDetails=  $this->kushGharService->getOrderDetailsById($id);
//            $customerDetails = $this->kushGharService->getCustomerDetails($OrderDetails['CustId']);
//            $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($OrderDetails['CustId']);
//            $renderHtml=  $this->renderPartial("orderschedule",array("customerDetails" => $customerDetails, "customerAddressDetails" => $customerAddressDetails, "OrderDetails"=>$OrderDetails,'vendors'=>$vendors),true);
//            $obj=array('status'=>'success','html'=>$renderHtml);
//            $renderScript=  $this->rendering($obj);
//            echo $renderScript;
//         } catch (Exception $ex) {
//            error_log("#######Exception Occured#######". $ex->getMessage());
//        }
//    }
 }