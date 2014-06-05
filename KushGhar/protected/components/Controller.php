<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $loginForm;
    public $forgotForm;
    public $registerForm;
    public $session;
    public $kushGharService;
   
    public function init() {
       
       $this->kushGharService=new KushGharService();
               Yii::app()->getClientScript()->registerCoreScript('jquery');

//
//       session object created ...
//
        if (isset($this->session)) {

        } else {

            $this->session = new CHttpSession();
        }
        $this->session->open(); // session started...
        
//        if (isset($this->session)) {
//            if (!empty($this->session['isEmployee']) && $this->session['isEmployee'] == 1 && $this->session['switchRole'] == "user") {
//                $this->layout = 'coactiveLayout';
//                Yii::app()->bootstrap->registerCoActiveCss_employee();
//                return;
//            } else if (!empty($this->session['isEmployer']) && $this->session['isEmployer'] == 1 && $this->session['switchRole'] == "employer") {
//                $this->layout = 'employersLayout';
//                Yii::app()->bootstrap->registerCoActiveCss_employee();
//                return;
//            } else if (!empty($this->session['isPartner']) && $this->session['isPartner'] == 1 && $this->session['switchRole'] == "partner") {
//                Yii::app()->bootstrap->registerCoActiveCss_partner();
//                $this->layout = 'partnersLayout';
//                return;
//            } else if (!empty($this->session['isAdmin']) && $this->session['isAdmin'] == 1 && $this->session['switchRole'] == "admin") {
//                Yii::app()->bootstrap->registerCoActiveCss_default();
//                $this->employersModel = new EmployerForm();
//                $this->layout = 'adminLayout';
//                return;
//            } else {
//                Yii::app()->bootstrap->registerCoActiveCss_default();
//            }
//
//
//        }
    }

    public function rendering($result) {
        //$obj = array("data" => $result, "status" => $result, "error" => "");
        return CJSON::encode($result);
    }

   
   public function sendMailToUser($to, $name, $subject, $message, $employerName, $employerEmail, $templateType) {
        error_log("order  enter sendMail============");
       $streamObj = array();
        $streamObj['toAddress'] = $to;
        $streamObj['userName'] = $name;
        $streamObj['subject'] = $subject;
        $streamObj['message'] = $message;
        $streamObj['companyLogo'] = '';
        $streamObj['employerName'] = $employerName;
        $streamObj['employerEmail'] = $employerEmail;
        $streamObj['mailType'] = $templateType;

        // $streamObj['isNew'] =(boolean)1;
        try {
            Yii::app()->mail->sendmails($streamObj);
        } catch (Exception $ex) {
            error_log("#########Exception Occurred in sendMailToUser########".$ex->getMessage());
        }
    }
 
 
 


    

}
