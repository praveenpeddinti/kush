<?php
/**
 * Developer Name: Suresh Reddy
 * CommonUtility is the customized for common methods.
 * All  common methods need to mention here.
 */
class CommonUtility 
{
    
   /**
 * Developer Name: Suresh Reddy & HariBabu
 * this method is used for send a mail using below parameters.
 * 
    * 
    * $view  basic template file
    * $params array ,these array parames will bind with view file.
    * $subject subject of email
    * $toAddress toAddress , sender's email addresses
    * $fromAddress fromAddress of User
 */ 

// this is local variable, which can accessiable in any function
public function actionSendmail($view, $params, $subject, $toAddress, $fromAddress) {
  error_log("enter Comm----------------");
        try {
            Yii::import('ext.yii-mail.YiiMailMessage');               
            Yii::app()->mail->transportOptions = array(
           'host' => 'webmail.kushghar.com',
           'username' => 'no-reply@kushghar.com',
           'password' => 'Kush1029',
           'port' => 25,
           'encryption' => 'ssl'
           );
            Yii::app()->mail->transportType = 'smtp';// Uncomment these when email is configured in admin section for Template management
            $message = new YiiMailMessage;
            $message->view = $view;
            $message->setBody($params, 'text/html');
            error_log("enter Comm---------1-------");
            $message->subject = $subject;
            $message->addTo($toAddress);
            error_log("enter Comm-----------2-----");
            $message->from = $fromAddress;
            error_log("enter Comm------------3----");
        if (Yii::app()->mail->send($message)) {
            error_log("enter Comm---------if-------");
            return true;
        } else {
            error_log("enter Comm----------else------");
            return false;
        }
    }
    catch (Exception $ex) {
        error_log("Send Email Exception".$ex->getMessage());
        }
}

     

}