<?php

class SiteController extends Controller {

    /**
     * This is the default action index call our site
    */
    public function actionIndex() {
        $this->session['UserType']='';
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
        if(isset($_REQUEST['uname'])){
        $this->session['UserType'] = "inviteToEmail";
        $this->session['InviteEmailId'] = $_REQUEST['uname'];
        //error_log("enter splash page======".$this->session['UserType']);
       // 
        }else{
            $this->session->destroy();
            
        }
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
    
    
    /* Cleaning Page */
    public function actionCleaning() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->render('cleaning',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
    /* Car Washing Page */
    public function actionCarwash() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->render('carwash',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
    /* Stewards Page */
    public function actionStewards() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->render('stewards',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }
    /* More Services Page */
    public function actionMoreservices() {
        $inviteForm = new InviteForm;
        $getServices = $this->kushGharService->getServices();
        $this->render('moreservices',array("inviteModel" => $inviteForm, "getServices"=>$getServices));
    }

}