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
                            $mess1 = 'http://www.kushghar.com/site/invite?uname=' . $email[$i] . "\r\n\n";
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
                $userDetails = $this->kushGharService->getAllUsers($startLimit, $endLimit);
                $renderHtml = $this->renderPartial('newManage', array('userDetails' => $userDetails, 'totalCount' => $totaluser), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totaluser);
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

    public function actionInviteStatus() {error_log("enter invite mode====");
        $subject = 'KushGhar Invitation';
        $email = $_POST['email'];
        
        $mess1 = 'http://www.kushghar.com/site/invite?uname=' . $email . "\r\n\n";
        //$mess1 = 'http://115.248.17.88:6060/site/invite?uname=' . $email . "\r\n\n";
        $messages = $mess1;
        $changeUserStatus = $this->kushGharService->sendInviteMailToUser($_POST['Id'], $_POST['status']);
        $this->sendMailToUser($_POST['email'], '', $subject, $messages, 'KushGhar', 'no-reply@kushghar.com', 'InvitationMail');
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

}