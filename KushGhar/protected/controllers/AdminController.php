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
                    if( ($inviteUser=='No user') && ($custUser=='No user')){error_log("No USer===========");
                    $result = $this->kushGharService->getInvitationFriendUser($inviteFriends, $this->session['Type']);
                    }
                    else{
                        error_log("Yes USer===========");
                        $errors = array("InviteForm_error" => 'User Exist.');
                        $obj = array('status' => 'error', 'data' => '', 'error' => $errors); 
                    }
                    error_log("Result===========".$result);
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
                error_log("After Subject==============================");
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="sendInvitationMailToUser";
                $params1 = array('Logo' => $Logo, 'Name' =>$name, 'Referrer'=>$referrer);
                $mess1 = 'http://www.kushghar.com/user/registration?Uname=' . $inviteFriends->Email . "\r\n\n";
                $this->sendMailToUser($to1, $name, $subject, $mess1, 'KushGhar', 'no-reply@kushghar.com', 'InvitationMail');            
                /*
                 * KG Team mail details
                 */
                $to = 'praveen.peddinti@gmail.com';
                //$subject ="Order placed";
                //$Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                //$employerEmail = "no-reply@kushghar.com";
                $messageview="InvitationMail";
                $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'Phone'=>$phone, 'Location'=>$location, 'Referrer'=>$referrer);
                //$params = '';
                $sendMailToUser=new CommonUtility;
                $sendMailToUser->actionSendmail($messageview1,$params1, $subject, $to1,$employerEmail);
                $mailSendStatusw=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                        $obj = array('status' => 'success', 'data' => $result, 'error' => 'Invitation sent Successfully.');
                    } else {
                        error_log("Referrer started in params=========Userinvited error=============");
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
        $mess1 = 'http://115.248.17.88:6060/user/registration?Uname=' . $email . "\r\n\n";
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
 }