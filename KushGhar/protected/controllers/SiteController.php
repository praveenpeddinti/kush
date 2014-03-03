<?php

class SiteController extends Controller {

    /**
     * This is the default action index call our site
    */
    public function actionIndex() {error_log("enter====");
       // $this->session->destroy();
        $this->render('index');
    }

    /* AboutUs Page */
    public function actionAboutus() {
        $this->render('aboutus');
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

}