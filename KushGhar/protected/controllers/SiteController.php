<?php

class SiteController extends Controller {

    /**
     * This is the default action index call our site
    */
    public function actionIndex() {
        $this->session['UserType']='';
        //if(empty($this->session['UserType'])){ unset ($_SESSION['UserType']);}
        error_log("enter splash page==index====".$this->session['UserType']);
       // $this->session->destroy();
        $this->render('index');
    }

    /* AboutUs Page */
    public function actionAboutus() {
        $this->render('aboutus');
    }

    /* Mission Page */
    public function actionMission() {
        $this->render('mission');
    }

    /* Press Page */
    public function actionPress() {
        $this->render('press');
    }

    /* Careers Page */
    public function actionCareers() {
        $this->render('careers');
    }

    /* Privacy & Policy Page */
    public function actionPrivacyPolicy() {
        $this->render('privacyPolicy');
    }

    /* Terms of Service Page */
    public function actionTermsofService() {
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
    
    public function actionInvite() {
        $this->session['UserType'] = "inviteToEmail";
        error_log("enter splash page======".$this->session['UserType']);
       // $this->session->destroy();
        $this->render('index');
    }
    public function actionInviteCust() {
        
        /*if(empty($_REQUEST['uname'])){
           $this->session['UserType'] = ""; 
        }else{
           $this->session['UserType'] = "inviteToCust"; 
        }*/
        $this->session['UserType'] = "inviteToCust";
        //error_log($_REQUEST['uname']."==enter splash page======".$this->session['UserType']);
       // $this->session->destroy();
        $this->render('index');
    }

}