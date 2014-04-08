<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('America/Toronto');

require '/opt/lampp/htdocs/CoActive/protected/extensions/mail/class.phpmailer.php';

class coActiveMailServer {


   function __construct($obj) {
 
       $host = 'mail.techo2.com';
        $port = 465;
        $authMail = 'praveen.peddinti@techo2.com';
        $authPassword = 'praveen@techo2';
         //$authMail = 'suresh.govindu@techo2.com';
        //$authPassword = 'sureshreddygovindu1';
        //$coActiveLogo = YII::app()->params['SERVER_URL'] . "/KushGhar/images/footer_logo.png";
        $coActiveLogo ='http://10.10.73.107/KushGhar/images/big_bullet.png';
        $date = date("Y-m-d");
        error_log("logo------------------".$coActiveLogo);
        if ($obj['mailType'] == "employerMessage") {
            $this->employerMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        } else if ($obj['mailType'] == "employeeVerification") {
            $this->employeeMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "dependentMail") {
            $this->dependentMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "registeredUsers") {
            $this->registeredMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "employerVerification") {
            $this->employerMessageVerification($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "upgradedMail") {
            $this->upgradedMessageVerification($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "forgotmail") {
            $this->forgotMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "resetMessage") {
            $this->resetMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
        }else if ($obj['mailType'] == "getintouch") {
            $this->getInTouchMessage($obj, $host, $port, $authMail, $authPassword, $coActiveLogo,$date);
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
                    $mail->SMTPSecure = 'ssl';
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


/*function employerMessage($obj,$host,$port,$authMail,$authPassword,$coActiveLogo,$date) {
        $template2 = '';
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/fromAdminmessage.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = explode(",", $obj['toAddress']);        
        $userName = explode(",", $obj['userName']);
        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress[$i]) != "") {
                   try{
         
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->Debugoutput = 'html';
                $mail->Host = $host;
                $mail->Port = $port;
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->Username = $authMail;
                $mail->Password = $authPassword;
                $mail->SetFrom($obj['employerEmail'], 'CoActive:'.$obj['employerName']);
               // $mail->AddReplyTo($obj['employerEmail'], $obj['employerName']);
               
                $template2 = str_replace('{--COMPANYLOGO--}', stripslashes(ucwords($obj['companyLogo'])), $data2);
                 $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                $template2 = str_replace('{--ADMINNAME--}', stripslashes(ucwords($obj['employerName'])), $template2);
            $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                $template2 = str_replace('{--MESSAGE--}', stripslashes($obj['message']), $template2);
                $template2 = str_replace('{--USERNAME--}', stripslashes($userName[$i]), $template2);
                $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                
                $mail->AddAddress($addAddress[$i], $userName[$i]);
                $mail->Subject = "Important company message!";
                $mail->Body = $template2;
                $mail->AltBody = 'This is a plain-text message body';
                if (!$mail->Send()) {
                    error_log("Mailer Error: " . $mail->ErrorInfo);
                } else {
                    error_log("Message sent!");
                }
                }catch(Exception $e){
                    error_log("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2".$e->getMessage());

                }
            }
        }
        return "succss";
    }

    function employeeMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/employeeverification.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $companyLogo = str_replace("250X250", "50X50", $obj['companyLogo']);        
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];        
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {                    
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                   // $mail->AddReplyTo($employerEmail, $employerName);
                    $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
                     $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                    $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);
                    $mail->Subject = "Individual account verification";
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
    
    function dependentMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';        
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/dependentmessage.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $companyLogo = $obj['companyLogo'];
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];        
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {                    
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                  //  $mail->AddReplyTo($employerEmail, $employerName);
                    $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
                     $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                    $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);                    
                    $mail->Subject = "Making dependent changes";
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
    
     function registeredMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = $message;        
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/registeredmessage.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $companyLogo = $obj['companyLogo'];
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];        
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {                    
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                  //  $mail->AddReplyTo($employerEmail, $employerName);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $data2);
                     $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COMPANYLOGO--}', stripslashes($companyLogo), $template2);
                    $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    
                    $mail->AddAddress($addAddress, $userName);                    
                    $mail->Subject = "Message from $employerName";                    
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
    
    function employerMessageVerification($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/employerverification.html";
        $handle2 = fopen($temp2, "r");
        $data2 = file_get_contents($temp2);
        $addAddress = $obj['toAddress'];
        $userName = $obj['userName'];
        $message = $obj['message'];
        $companyLogo = $obj['companyLogo'];
        $employerName = $obj['employerName'];
        $employerEmail = $obj['employerEmail'];        
//        for ($i = 0; $i < sizeof($addAddress); $i++) {
            if (trim($addAddress) != "") {
                try {
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';
                    $mail->Host = $host;
                    $mail->Port = $port;
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
               //     $mail->AddReplyTo($employerEmail, $employerName);
                    $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$template2);
                    $template2 = str_replace('{--MESSAGE1--}',stripslashes( $obj['subject']),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                    $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);
                    $mail->Subject = $obj['subject'];
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
    function upgradedMessageVerification($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';

        error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/upgradedmessage.html";
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
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                    //$mail->AddReplyTo($employerEmail, $employerName);
                    $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
                     $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                    $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject = 'Upgrade Message from ' . $obj['employerName'];
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
    
    
    function forgotMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';

        error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/forgotmessage.html";
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
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                  //  $mail->AddReplyTo($employerEmail, $employerName);
//                    $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);
                     $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  "Password reset";
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
    function resetMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';

        error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/resetmessage.html";
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
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                   // $mail->AddReplyTo($employerEmail, $employerName);
//                    $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);
                     $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  "Confirmation of updated password";
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
    
    function getInTouchMessage($obj, $host, $port, $authMail, $authPassword,$coActiveLogo,$date) {
        $template2 = '';

        error_log("&*****************&&&&&&&&&&&&&&&&********************in dependentMessage function=========");
        $temp2 = "/opt/lampp/htdocs/CoActive/protected/extensions/mail/getintouchmessage.html";
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
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Username = $authMail;
                    $mail->Password = $authPassword;
                    $mail->SetFrom($employerEmail, 'CoActive:'.$employerName);
                   // $mail->AddReplyTo($employerEmail, $employerName);
                    $template2 = str_replace('{--USERNAME--}',stripslashes(ucwords("$userName")),$data2);                    
                    $template2 = str_replace('{--DATE--}',stripslashes($date),$template2);
                    $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
                    $template2 = str_replace('{--EMPLOYERNAME--}',stripslashes($employerName),$template2);
                    $template2 = str_replace('{--COACTIVELOGO--}', stripslashes($coActiveLogo), $template2);
                     $template2 = str_replace('{--SITEURL--}', YII::app()->params['SERVER_URL'], $template2);
                    $mail->AddAddress($addAddress, $userName);
                    
                    $mail->Subject =  "Thanks for your message!";
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
//if($templateType=="employeeVerification"){
//
//    
//    $temp2 = "/opt/lampp/htdocs/CoActive/mail/employeeverification.html";
//                $handle2 = fopen($temp2, "r");
//                $data2 = file_get_contents($temp2);
//                                $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
//                                $template2 = str_replace('{--ADMINNAME--}',stripslashes(ucwords("$employerName")),$template2);
//                                $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);  
//                                $template2 = str_replace('{--USERNAME--}',stripslashes($userName),$template2);
//          
//    
//}
//if($templateType=="adminMessage"){
//    $temp2 = "/opt/lampp/htdocs/CoActive/mail/fromAdminmessage.html";
//                $handle2 = fopen($temp2, "r");
//                $data2 = file_get_contents($temp2);
//                                $template2 = str_replace('{--COMPANYLOGO--}',stripslashes(ucwords("$companyLogo")),$data2);
//                                $template2 = str_replace('{--ADMINNAME--}',stripslashes(ucwords("$employerName")),$template2);
//                                $template2 = str_replace('{--MESSAGE--}',stripslashes($message),$template2);
////                                 $template2 = str_replace('{--USERNAME--}',stripslashes($userName),$template2);
//          
//    
//}
//Set who the message is to be sent to
//$mail->AddAddress($addAddress, $username);
//$addAddress="sureshreddy.2040@gmail.com,suresh.govindu@techo2.com,mikeaaron8@gmail.com";
//$addAddress=explode(",",$addAddress);
//for($i=0;$i<sizeof($addAddress);$i++){
//if(trim($addAddress[$i])!=""){
//$mail->AddBCC($addAddress[$i], '');
//}
//}*/
}

?>
