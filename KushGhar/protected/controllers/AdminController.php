<?php

class AdminController extends Controller {

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
     * Displays the Admin login page
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
            $this->render('login', array('adminLogin' => $model));
        }
    }

    public function actionDashboard() {
        try {
            $this->session['Type'] = 'Admin';
            $model = new BulkForm;

            $request = yii::app()->getRequest();
            $formName = $request->getParam('BulkForm');
            if ($formName != '') {
                $model->attributes = $request->getParam('BulkForm');
                $errors = CActiveForm::validate($model);
                if ($errors != '[]') {
                    $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
                } else {
                    $email = array();
                    $email = explode(",", $model->EmailIds);
                    $flag = 0;

                    for ($i = 0; $i < sizeof($email); $i++) {
                        $details = $this->kushGharService->getcheckNewUserExist($email[$i]);
                        if ($details == 'No user') {
                            $to = $email[$i];
                            $subject = 'KushGhar Invitation';
                            $mess1 = 'http://www.kushghar.com/user/registration?Uname=' . $email[$i] . "\r\n\n";
                            //$mess1 = 'http://115.248.17.88:6060/site/invite?uname=' . $email[$i] . "\r\n\n";
                            $messages = $mess1;
                            $this->sendMailToUser($to, '', $subject, $messages, 'KushGhar', 'no-reply@kushghar.com', 'InvitationMail');
                        }
                        $flag++;
                    }
                    if ($flag == sizeof($email)) {
                        $result = 'success';
                    }
                    $result = 'success';
                    if ($result == "success") {
                        $obj = array('status' => 'success', 'message' => 'ggg', 'error' => '');
                    } else {
                        $obj = array('status' => 'error', 'message' => '', 'error' => 'dfdfd');
                    }
                }
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            } else {
                $this->render('dashboard', array('model' => $model));
            }
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
    }

    public function actionManage() {
        try {
            $this->render("manage");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    
    public function actionNewManage() {
        try {
            if (isset($_GET['userDetails_page'])) {
                $model = new BulkForm;
                $totaluser = $this->kushGharService->getTotalUsers();
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                if(count($totaluser)==0)
                {
                 $obj=  array('status' => 'success', 'html' => 0, 'totalCount' => $totaluser);
                }
                else
                {
                $userDetails = $this->kushGharService->getAllUsers($startLimit, $endLimit);
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
        
        $mess1 = 'http://www.kushghar.com/user/registration?Uname=' . $email . "\r\n\n";
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
    
    public function actionOrder() {
        try {
            
            //$orderDetails = $this->kushGharService->getOrderDetailsinAdmin();
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