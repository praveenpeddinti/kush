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
        try {
            Yii::import('ext.yii-mail.YiiMailMessage');               
            Yii::app()->mail->transportOptions = array(
           /*'host' => 'smtp.gmail.com',
           'username' => 'praveen.peddinti@gmail.com',
           'password' =>'9986531867',
           'port' => 465,
           'encryption' => 'ssl',*/
           'host' => 'webmail.kushghar.com',
           'username' => 'no-reply@kushghar.com',
           'password' =>'Kush1029',
           'port' => 25,
           'encryption' => '',
         
           );
            Yii::app()->mail->transportType = 'smtp';// Uncomment these when email is configured in admin section for Template management
            $message = new YiiMailMessage;
            $message->view = $view;
            $message->setBody($params, 'text/html');
            $message->subject = $subject;
            $message->addTo($toAddress);
            /*if(($message->view=='CustomerInvitationMailToKGTeam') ||($message->view=='orderplacemessagetoKG')){
            $message->addCC('rtummala1@yahoo.com');
            $message->addCC('swamy.deva@gmail.com');
            $message->addCC('satyalika@gmail.com');
            $message->addCC('jamma.suresh@gmail.com');
            $message->addCC('admin@kushghar.com');
            $message->addCC('helpme@kushghar.com');
            }*/
            $message->from = $fromAddress;
        if (Yii::app()->mail->send($message)) {
            return true;
        } else {
            return false;
        }
    }
    catch (Exception $ex) {
        error_log("Send Email Exception".$ex->getMessage());
        }
}

     

}