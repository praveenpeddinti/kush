<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('America/Toronto');

require '/opt/lampp/htdocs/KushGhar/protected/extensions/mail/class.phpmailer.php';

class coActiveMailServer {


   function __construct($obj) {
 
        /*$host = 'mail.techo2.com';
        $port = 465;
        $authMail = 'praveen.peddinti@techo2.com';
        $authPassword = 'praveen@techo2';*/
       
        $host = 'webmail.kushghar.com';
        $port = 25;
        $authMail = 'no-reply@kushghar.com'; 
        $authPassword = 'Kush1029';
        $coActiveLogo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
        $date = date("Y-m-d");
        
        if ($obj['mailType'] == "InvitationMail") {
            $this->getInvitationMail($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        } else if ($obj['mailType'] == "getintouch") {
            $this->getInTouchMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        } else if ($obj['mailType'] == "sendInvitationMailToUser") {
            $this->getUserInvitationMail($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "PasswordMail") {
            $this->getPasswordMailMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "OrderPlace") {
            //$this->getInvitationMail($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
            $this->getOrderPlaceMailMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "OrderPlaceToKGTeam") {
            //$this->getInvitationMail($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
            $this->getOrderPlaceMailMessageToKGTeam($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }

}


  function getInTouchMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';

        error_log($coActiveLogo."==&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        $temp2 = "/opt/lampp/htdocs/KushGhar/protected/extensions/mail/getintouchmessage.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $companyLogo = $obj['companyLogo'];
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];
        error_log("&************1111111*****&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    $mail->SMTPSecure = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, $employerName);
                   // $mail->AddReplyTo($employerEmail, $employerName);
                    //$template2 = str_replace('{--EMAILIDS--}',stripslashes($emailIds),$template2);  
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                     $template2 = str_replace('{--TOADDRESS--}',stripslashes($addAddress),$template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    
                    $mail->Subject =  "KushGhar Invitation";
                    $mail->Body = $template2;                    
                    $mail->AltBody = 'This is a plain-text message body';
                    if (!$mail->Send()) {
                        $result = "failed";
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    } else {
                        $result = "success";
                        error_log("Message sent!");
                    }
                } catch (Exception $e) {
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@Exception Occurred while mail sending in employee...@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2" . $e->getMessage());
                }
            }
//        }
        return $result;
    }
    
  //User get the Kushghar invite mail without click  
    function getUserInvitationMail($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        error_log($coActiveLogo."==&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        
        $template2 = '';

        $temp2 = "/opt/lampp/htdocs/KushGhar/protected/extensions/mail/sendInvitationMailToUser.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $Kushmessage2 = "KushGhar - Making people's lives better, one home at a time.";
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];
        error_log("&************1111111*****&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    //$mail->SMTPSecure = 'ssl';
                    $mail->SMTPSecure = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, $employerName);
                   // $mail->AddReplyTo($employerEmail, $employerName);
                    //$template2 = str_replace('{--EMAILIDS--}',stripslashes($emailIds),$template2);  
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--MESSAGE2--}',stripslashes($Kushmessage2),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                     $template2 = str_replace('{--TOADDRESS--}',stripslashes($addAddress),$template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  "KushGhar Invitation";
                    $mail->Body = $template2;                    
                    $mail->AltBody = 'This is a plain-text message body';
                    if (!$mail->Send()) {
                        $result = "failed";
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    } else {
                        $result = "success";
                        error_log("Message sent!");
                    }
                } catch (Exception $e) {
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@Exception Occurred while mail sending in employee...@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2" . $e->getMessage());
                }
            }
//        }
        return $result;
    }

    
    function getInvitationMail($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        error_log($coActiveLogo."==&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        
        $template2 = '';

        $temp2 = "/opt/lampp/htdocs/KushGhar/protected/extensions/mail/InvitationMail.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $Kushmessage2 = "KushGhar - Making people's lives better, one home at a time.";
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];
        error_log("&************1111111*****&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    //$mail->SMTPSecure = 'ssl';
                    $mail->SMTPSecure = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, $employerName);
                    
                    //$template2 = str_replace('{--EMAILIDS--}',stripslashes($emailIds),$template2);  
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--MESSAGE2--}',stripslashes($Kushmessage2),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                     $template2 = str_replace('{--TOADDRESS--}',stripslashes($addAddress),$template2);
                    $mail->AddAddress($addAddress, $userName);

                    $mail->AddCC('jamma.suresh@gmail.com');
                    $mail->AddCC('jamma.suresh@techo2.com');
                    $mail->AddCC('gharibabu.ece@gmail.com');

                    $mail->Subject =  "KushGhar Invitation";
                    $mail->Body = $template2;                    
                    $mail->AltBody = 'This is a plain-text message body';
                    if (!$mail->Send()) {
                        $result = "failed";
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    } else {
                        $result = "success";
                        error_log("Message sent!");
                    }
                } catch (Exception $e) {
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@Exception Occurred while mail sending in employee...@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2" . $e->getMessage());
                }
            }
//        }
        return $result;
    }
    
    
    function getPasswordMailMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';

        $temp2 = "/opt/lampp/htdocs/KushGhar/protected/extensions/mail/PasswordMail.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $Kushmessage2 = "KushGhar - Making people's lives better, one home at a time.";
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];
        error_log("&************1111111*****&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    //$mail->SMTPSecure = 'ssl';
                    $mail->SMTPSecure = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, $employerName);
                   // $mail->AddReplyTo($employerEmail, $employerName);
                    //$template2 = str_replace('{--EMAILIDS--}',stripslashes($emailIds),$template2);  
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--MESSAGE2--}',stripslashes($Kushmessage2),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                     $template2 = str_replace('{--TOADDRESS--}',stripslashes($addAddress),$template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  "Password details";
                    $mail->Body = $template2;                    
                    $mail->AltBody = 'This is a plain-text message body';
                    if (!$mail->Send()) {
                        $result = "failed";
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    } else {
                        $result = "success";
                        error_log("Message sent!");
                    }
                } catch (Exception $e) {
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@Exception Occurred while mail sending in employee...@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2" . $e->getMessage());
                }
            }
//        }
        return $result;
    }
    
    
    function getOrderPlaceMailMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        error_log($coActiveLogo."==&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        
        $template2 = '';

        $temp2 = "/opt/lampp/htdocs/KushGhar/protected/extensions/mail/orderplacemessage.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $subject = $obj['subject'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $Kushmessage2 = "KushGhar - Making people's lives better, one home at a time.";
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];
        error_log($message."==&*******order*****1111111*****&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    error_log("&*********praveen********&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    //$mail->SMTPSecure = 'ssl';
                    $mail->SMTPSecure = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, $employerName);
                    
                    //$template2 = str_replace('{--EMAILIDS--}',stripslashes($emailIds),$template2);  
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--MESSAGE2--}',stripslashes($Kushmessage2),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                     $template2 = str_replace('{--TOADDRESS--}',stripslashes($addAddress),$template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  $subject;
                    $mail->Body = $template2;                    
                    $mail->AltBody = 'This is a plain-text message body';
                    if (!$mail->Send()) {
                        $result = "failed";
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    } else {
                        $result = "success";
                        error_log("Message sent!");
                    }
                } catch (Exception $e) {
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@Exception Occurred while mail sending in employee...@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2" . $e->getMessage());
                }
            }
//        }
        return $result;
    }
    
    function getOrderPlaceMailMessageToKGTeam($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        error_log($coActiveLogo."==&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        
        $template2 = '';

        $temp2 = "/opt/lampp/htdocs/KushGhar/protected/extensions/mail/orderplacemessagetoKushghar.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $subject = $obj['subject'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $Kushmessage2 = "KushGhar - Making people's lives better, one home at a time.";
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];
        error_log($message."==&*******order*****1111111*****&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    error_log("&*********praveen********&&&&&&&&&&&&&&&&********************in dependentMessage function=========$addAddress===$userName");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    //$mail->SMTPSecure = 'ssl';
                    $mail->SMTPSecure = '';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, $employerName);
                    
                    //$template2 = str_replace('{--EMAILIDS--}',stripslashes($emailIds),$template2);  
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--MESSAGE2--}',stripslashes($Kushmessage2),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                     $template2 = str_replace('{--TOADDRESS--}',stripslashes($addAddress),$template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  $subject;
                    $mail->Body = $template2;                    
                    $mail->AltBody = 'This is a plain-text message body';
                    if (!$mail->Send()) {
                        $result = "failed";
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    } else {
                        $result = "success";
                        error_log("Message sent!");
                    }
                } catch (Exception $e) {
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@Exception Occurred while mail sending in employee...@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2" . $e->getMessage());
                }
            }
//        }
        return $result;
    }
    
    
    

}

?>
