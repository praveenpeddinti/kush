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
                $result = $this->kushGharService->login($model,'Admin');
                if ($result == "false") {
                    $errors = array("LoginForm_error" => 'Invalid User or Password.');
                    $obj = array('status' => '', 'data' => '', 'error' => $errors);
                } else {
                    $ppp = md5($result->password_hash);
                    $this->session['UserId'] = $result->Id;
                    $this->session['email'] = $result->email_address;
                    $this->session['firstName'] = $result->first_name;
                    $this->session['LoginPic'] = $result->profilePicture;
                    $this->session['Type'] ='Admin';
                    $obj = array('status' => 'success', 'data' => $result, 'error' => '');
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        }else{
           $this->render('login', array('adminLogin' => $model));
 
        }
    }

   
public function actionDashboard(){error_log("enter dashboard================");
    try{
    $this->session['Type']='Admin';
    $model = new BulkForm;
    
    $request = yii::app()->getRequest();
        $formName = $request->getParam('BulkForm');
        if ($formName != '') {
            $model->attributes = $request->getParam('BulkForm');
            $errors = CActiveForm::validate($model);
            if ($errors != '[]') {error_log("dfdfdf=======");
                $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
            } else {
                error_log("emails are====".$model->EmailIds);
                $email=array();
                $email=explode(",",$model->EmailIds);
                 $flag=0;
                for($i=0;$i<sizeof($email);$i++){
                    
                   //$details=$this->kushGharService->getcheckNewUserExist($email[$i]);
                    $details=$this->kushGharService->getcheckNewUserExist($email[$i]);
                    error_log("email id is====".$details);
                    if($details=='No user'){error_log("new users eith email ====".$email[$i]);
                    $mess = 'Hi' . "\r\n";
                    $mess = $mess . 'Welcome from KushGhar.com ' . "\r\n\n";
                    $mess = $mess . 'You can visit KushGhar.com by clicking following url. ' . "\r\n\n";
                    $mess = $mess . 'http://115.248.17.88:6060/site/invite?uname=' . $email[$i] . "\r\n\n";
                    $mess = $mess . 'Regards,' . "\r\n" . 'KushGhar.';
                    $to = $email[$i];
                    $subject = 'Kushghar Invitation';
                    $message = $mess;
                    $headers = 'From: praveen.peddinti@gmail.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
                    }
                    $flag++;
                    error_log("flag======".$flag);
                }
                if($flag==sizeof($email)){ $result='success';}
                //$result='success';
                error_log("dffffffffffffffff===".$result);
                if ($result == "success") {
                    //$message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => 'ggg', 'error' => '');
                } else {
                    //$message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => 'dfdfd');
                }
            }
            $renderScript = $this->rendering($obj);
            echo $renderScript;
        } else {
            $this->render('dashboard',array('model'=> $model));  
            }
    
    
    
    
    
    }catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        
    }
}

  public function actionManage(){
      try{
          $model = new BulkForm;
          $userDetails = $this->kushGharService->getAllUsers();
          
          /*$provider = new CArrayDataProvider($userDetails, 
            array(
                "pagination" => array(
                    "pageSize" => 5
                )
           )
        );*/
        
        //$this->render("manage", array("userDetails" => $provider));
          
          
          $this->render('manage', array('userDetails'=>$userDetails));  
      }catch(Exception $ex){
           error_log("#########Exception Occurred########".$ex->getMessage());
      }
  }
  
  public function actionManageStatus(){
      error_log("Enter Active status====".$_POST['Id']."===".$_POST['status']);
      $changeUserStatus = $this->kushGharService->getStatusUser($_POST['Id'],$_POST['status']);
      $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
      echo CJSON::encode($obj);
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


