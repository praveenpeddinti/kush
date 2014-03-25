<?php

class InviteUser extends CActiveRecord {

    public $first_name;
    public $last_name;
    public $email_address;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_InvitationUsers';
    }

    public function checkAuthentication($model) {
        // only checking with the email not the username; should have do with the username also... ;
        try {
            $user = User::model()->findByAttributes(array('Email' => $model->username, 'Password' => md5($model->password)));
            if (isset($user)) {
                $user->LastLoginOn = gmdate("Y-m-d H:i:s", time());
                $user->update();
            }
        } catch (Exception $ex) {
            error_log("#########EXCEPTION OCCURRED IN CHECK AUTENTICATION########" . $ex->getMessage());
        }
        return $user;
    }

    public function checkUserExist($model) {
        $sub = $sub1 = $or = "";
        if (isset($model->email) && $model->email != "" && $model->email != "undefined" && $model->email != "null") {
            $sub = "email like '%$model->email%'";
        }
//        if (isset($model->username) && $model->username != "" && $model->username != "undefined" && $model->username != "null") {
//            $sub1 = "userName like '%$model->username%'";
//        }
//        if ((isset($model->email) && $model->email != "" && $model->email != "undefined" && $model->email != "null") && (isset($model->username) && $model->username != "" && $model->username != "undefined" && $model->username != "null")) {
//            $or = "OR";
//        }

        try {
            $user = User::model()->findByAttributes(array('Email' => $model->email));
//        $query = "Select * From User where Email like '%$model->email%'";
            error_log("==User Object=====$user->Email");
//        $user = YII::app()->db->createCommand($query)->queryRow();
            if (isset($user)) {
                $result = $user;
                $user->IsPasswordReset = 1;
                $user->update();
                error_log("==========userResult=====true===userName==");
            } else {
                $result = false;
            }
        } catch (Exception $ex) {
            error_log("=====Exception occurred in checkUserExist====" . $ex->getMessage());
        }
        return $result;
    }

    public function saveInvitationUser($model) {
        $result = "false";
        $user = InviteUser::model()->findByAttributes(array('email_address' => $model->Email));
        
        error_log($model->LastName."*********************************firt name");
        if (!isset($user)) {
            try {
                $user = new InviteUser();
                
                
                $user->first_name = stripcslashes($model->FirstName);
                $user->last_name = stripcslashes($model->LastName);
                $user->email_address = stripcslashes($model->Email);
                
                if (!$user->save())
                    $result = "false";//return CHtml::errorSummary($this);
                else
                    $result = "success";
            } catch (Exception $ex) {
                error_log("=====Exception occurred in saveModel====" . $ex->getMessage());
            }
        }error_log("result=========".$result); 
        return $result;
    }

    public function userPasswordReset($id, $val) {
        $query = "Update User set isPasswordReset = $val where id = $id";
        return YII::app()->db->createCommand($query)->execute();
    }

    public function checkPasswordReset($id) {
        $query = "select isPasswordReset From User where id = $id";
        return YII::app()->db->createCommand($query)->queryRow();
    }

    public function updatePasswordByEmailId($email, $model) {
        $return = "failed";
        try{
        $user = User::model()->findByAttributes(array("Email"=>$email));
        if(isset($user)){
            $passwordV = md5($model->PasswordReset);
            $user->Password = $passwordV;
            $user->IsPasswordReset = 0;
            if($user->update())
                $return = "success";
        }
        }catch(Exception $ex){
            error_log("#########Exception Occurred updatePasswordByEmailId##########" . $ex->getMessage());
        }
        return $user;
    }

    public function updateProfile($model,$flag) {
        try{
        $user = User::model()->findByAttributes(array('UserId' => $model->UserId));
        $user->Email = $model->Email;
        $user->FirstName = stripslashes($model->FirstName);
        $user->LastName = $model->LastName;
        $user->MiddleName = $model->MiddleName;
        $user->NameSuffix = $model->NameSuffix;
        $user->ProfilePic = $model->ProfilePic;
        $user->UserId = $model->UserId;
        if (isset($user)) {

            if (!empty($model->new_password)) {
                $user->Password = md5($model->new_password);
            }
            if ($user->update()) {
                if($flag == "employee"){
                    Employee::model()->updateEmployeeDependency($model);
                    $physicianId = PrimaryCarePhysician::model()->savePhysician($model);
                    $model->PrimaryCarePhysicianId = $physicianId;
                    EmployeeContact::model()->saveEmployeeContact($model);
                }
                $user = User::model()->findByAttributes(array('UserId' => $model->UserId));
            }
        }
        }catch(Exception $ex){
            error_log("##########Exception Occurred in updateProfile#################".$ex->getMessage());
        }
        return $user;
    }

    public function saveEnrollmentData($model) {
        try {
            error_log("====In Save EnrollmentData=========$model->MiddleName==suffix==" . $model->NameSuffix);
            $user = new User();
            $user->FirstName = $model->FirstName;
            $user->LastName = $model->LastName;
            $user->MiddleName = $model->MiddleName;
            $user->NameSuffix = $model->NameSuffix;
            $user->Email = $model->Email;

            if (isset($model->UserId) && !empty($model->UserId) && $model->UserId != "null" && $model->UserId != "undefined") {
                $userObj = User::model()->findByAttributes(array('UserId' => $model->UserId));
                error_log("====In Save EnrollmentData=========$model->MiddleName==suffix=222222 update Condition=" . $model->NameSuffix."======UserId=======$model->UserId");
                $userObj->FirstName = $model->FirstName;
                $userObj->LastName = $model->LastName;
                $userObj->MiddleName = $model->MiddleName;
                $userObj->NameSuffix = $model->NameSuffix;
                $userObj->Email = $model->Email;
                if (!empty($model->ProfilePic))
                    $userObj->ProfilePic = $model->ProfilePic;
                else
                    $userObj->ProfilePic = "/images/user_noimage.png";
                $userObj->update();
                $model->Id = "";
                $id = $userObj->UserId;
            } else {
                error_log("=====save condition User======MD5 format===" . $model->Md5);
//            $user->Password = md5("test@123"); 
//                $checkUserExist = $this->checkUserEmailExist($model->Email);
                $user->ProfilePic = "/images/user_noimage.png";
                $user->RegisteredOn = date('Y-m-d h:i');
                $user->VerificationCode = $model->Md5;
                if ($user->save()) {
                    $id = $user->primaryKey;
                }
            }
        } catch (Exception $ex) {
            error_log("#########Exception Occurred while saving the Enrollment form##########" . $ex->getMessage());
        }
        return $id;
    }

    public function getAdminDetailsById($id) {
        $query = "select * from Admin where UserId = $id";
        return YII::app()->db->createCommand($query)->queryRow();

    }

    public function checkUserEmailExist($email) {
        $user = User::model()->findByAttributes(array('Email' => $email));
        return $user;
    }

      public function checkUserEmailExistWithRole($email,$role) {
          try{
    
        $user = User::model()->findByAttributes(array('Email' => $email));
       if(isset($user->Email)){
          $res=  UserRoles::model()->getUserRoleByIdandRollId($user->UserId,$role) ;
          
          if($res==true){
            return 'RoleExist';
          }else{
               
           return $user;   
          }
      }else{
          return false;
      }
        
        return $user;
          }catch(Exception $e){
           error_log("############Error Occurred updateUserVerificationCode#############" . $ex->getMessage());    
          }


    }

    public function updateUserVerificationCode($userId, $md5) {
        try {
            $user = User::model()->findByAttributes(array('UserId' => $userId));
            $user->VerificationCode = $md5;
            $user->update();
        } catch (Exception $ex) {
            error_log("############Error Occurred updateUserVerificationCode#############" . $ex->getMessage());
        }
    }

    public function updateEmployeeTOSStatus($userID) {
        try {
            $user = User::model()->findByAttributes(array('UserId' => $userID));
            $user->TOC = 1;
            $user->update();
        } catch (Exception $ex) {
            error_log("############Error Occurred updateEmployeeTOSStatus#############" . $ex->getMessage());
        }
        return $user;
    }

    public function getProfileDetails($userID,$flag) {
        try {
            if($flag == "others")
                $userProfile = User::model()->findByAttributes(array('UserId' => $userID));
            else if($flag == "employee"){
                $query = "SELECT FirstName, MiddleName,LastName,NameSuffix,Sex,Email,RegisteredOn,Status,ProfilePic,TOC,E.SSN Last4OfSSN FROM User U JOIN Employee E on E.UserId = U.UserId  WHERE U.UserId = $userID";
                $result = YII::app()->db->createCommand($query)->queryRow();
                $query = "SELECT *,P.Address PAddress FROM EmployeeContact E JOIN PrimaryCarePhysician P ON P.Id = E.PrimaryCarePhysicianId WHERE E.EmployeeUserId =  $userID";
                $result_contact = YII::app()->db->createCommand($query)->queryRow();
                $userProfile = new UserProfileBean();
                $userProfile->FirstName = $result['FirstName'];
                $userProfile->MiddleName = $result['MiddleName'];
                $userProfile->LastName = $result['LastName'];
                $userProfile->NameSuffix = $result['NameSuffix'];
                $userProfile->Email = $result['Email'];
                $userProfile->Status = $result['Status'];
                $userProfile->ProfilePic = $result['ProfilePic'];
                $userProfile->Last4OfSSN = $result['Last4OfSSN'];
                $userProfile->Address = $result_contact['Address'];
                $userProfile->Sex = $result['Sex'];
                $userProfile->HomePhone = $result_contact['HomePhone'];
                $userProfile->CellPhone = $result_contact['CellPhone'];
                $userProfile->PreferredMethodOfContactId = $result_contact['PreferredMethodOfContactId'];
                $userProfile->PrimaryCarePhysicianId = $result_contact['PrimaryCarePhysicianId'];
                $userProfile->PAddress = $result_contact['PAddress'];
                $userProfile->PracticeName = $result_contact['PracticeName'];
                $userProfile->DoctorName = $result_contact['DoctorName'];
                $userProfile->Website = $result_contact['Website'];
                $userProfile->Phone = $result_contact['Phone'];
                $userProfile->Website = $result_contact['Website'];
                
            }
            
        } catch (Exception $ex) {
            error_log("############Error Occurred getProfileDetails#############" . $ex->getMessage());
        }
        return $userProfile;
    }

    public function updateStatusById($userId, $status) {
        try {
            $user = User::model()->findByAttributes(array('UserId' => $userId));
            $user->Status = $status;
            $user->IsSignUp = 1;
            $user->update();
            Employee::model()->updateRelatedEmployeeStatus($userId,$status);
        } catch (Exception $ex) {
            error_log("############Error Occurred updateStatusById#############" . $ex->getMessage());
        }
        return $user;
    }

    public function checkUserVerificationCode($code, $flag) {
        try {
            $query = "Select * FROM User U  where U.VerificationCode = '$code'";
            error_log("====query====$query");
            $user = YII::app()->db->createCommand($query)->queryRow();
//        error_log("=====UserId=====".$user['UserId']."========".$user['SSN']."======".$user['FirstName']);
        } catch (Exception $ex) {
            error_log("############Error Occurred checkUserVerificationCode#############" . $ex->getMessage());
        }
        return $user;
    }

    public function getAEmployerByEmail($email) {
        try {
            $query = "SELECT U.Email,U.UserId,Em.EmployerName,Em.Logo FROM User U , Employer Em where Em.UserId = U.UserId and U.Email='$email'";
            error_log("====query ===getAEmployerByEmail======$query");
            $user = YII::app()->db->createCommand($query)->queryRow();
            error_log("@@@@@@@@@@@@@@@@222".$user['UserId']);
            error_log("@@@@@@@@@@@@@@@@222".$user['EmployerName']);
             error_log("@@@@@@@@@@@@@@@@222".$user->EmployerName);
            $employerObject = new Employers();
            $employerObject->Logo = $user['Logo'];
            $employerObject->EmployerName = $user['EmployerName'];
            
            $query = "Select * From User where UserId = " . $user['UserId'];
            error_log("======query=====$query");
            $user = YII::app()->db->createCommand($query)->queryRow();
//            $employerObject->EmployerName = $user['EmployerName'];
//            $employerObject->Logo = $user['Logo'];
            $employerObject->Email = $user['Email'];
            
        } catch (Exception $ex) {
            error_log("############Error Occurred checkUserVerificationCode#############" . $ex->getMessage());
        }
        return $employerObject;
    }

    public function getStateByUs() {
        $query = "select StateName  from USStates";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function saveCommonData($model) {
        try {
            $user = new User();
            $user->Email = $model->Email;
            $user->FirstName = $model->Name;
            if (isset($model->EmployerId) && !empty($model->EmployerId) && $model->EmployerId != "null" && $model->EmployerId != "undefined") {
                $user = User::model()->findByAttributes(array('Email' => $model->Email));
                $user->FirstName = $model->Name;
                $user->Email = $model->Email;
                if (!empty($model->ProfilePic))
                    $user->ProfilePic = $model->ProfilePic;
                else
                    $user->ProfilePic = "/images/user_noimage.png";
                $user->update();
                $id = $user->UserId;
//                error_log("====updateConfidtion=====$id");
            }else {
                $user->ProfilePic = "/images/user_noimage.png";
                $user->RegisteredOn = date('Y-m-d h:i');
                $user->VerificationCode = $model->MD5;
                if($mode->ProgramType == 5){
                    $user->Status = 1;
                    $user->IsSignUp = 1;
                }
                if ($user->save()) {
                    $id = $user->primaryKey;
                }
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred saveCommonData#############" . $ex->getMessage());
        }
        return $id;
    }
    
    public function deletedCommonUserById($userId){
        try{
            $query = "DELETE FROM User WHERE UserId = $userId";
            YII::app()->db->createCommand($query)->execute();
        }catch(Exception $ex){
            
        }
    }
    public function updateUserDependency($model){
        try{
            $result = "failrue";
            $user = User::model()->findByAttributes(array("UserId"=>$model->UserId));
            $user->FirstName = stripslashes($model->FirstName);
            $user->MiddleName = stripslashes($model->MiddleName);
            $user->LastName = stripslashes($model->LastName);
            if($user->update()){
                $result = "success";
            }
            
        }catch(Exception $ex){
            error_log("############Error Occurred updateUserDependency#############" . $ex->getMessage());
        }
        return $result;
    }
    
    public function EmployeeLogin($model){
        try{
           $employee = Employee::model()->findByAttributes(array("SSN"=>$model->SSN));
           
           if(isset($employee)){
               $result = User::model()->findByAttributes(array("UserId"=>$employee->UserId));
               if(strtolower($model->FirstName) != strtolower($result->FirstName) || strtolower($model->LastName) != strtolower($result->LastName)){
                   $result = "error";
               }             
           }else{
               $result = "error";
           }
        }catch(Exception $ex){
            error_log("############Error Occurred EmployeeLogin#############" . $ex->getMessage());
        }
        return $result;
    }
    public function getMatchedEmailAddress($email,$userId){
        try{
            $query = "SELECT UserId,Email FROM User WHERE Email LIKE '%$email%' AND Status = 1 AND IsSignUp = 1 AND UserId NOT IN($userId)";
            $result = YII::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("############Exception Occurred in getMatchedEmailAddress in model#############".$ex->getMessage());
        }
        return $result;
    }
    public function getUserObject($userId){
        try{
            $result = User::model()->findByAttributes(array("UserId"=>$userId));
        }catch(Exception $ex){
            error_log("############Exception Occurred in getUserObject of Service layer#############".$ex->getMessage());
        }
        return $result;
    }
    
    public function makeDependentUserToActiveState($userId){
        try {
            $result = "failed";
            $userObject = User::model()->findByAttributes(array("UserId"=>$userId));
            $userObject->Status = 1;
            $userObject->IsSignUp = 1;
            if($userObject->update())
                $result = "success";
        } catch (Exception $ex) {
            error_log("########Exception Occurred while executing makeDependentUserToActiveState  in CoactiveService==############" . $ex->getMessage());
        }
        return $result;
    }
    public function deleteDependentUser($userId){
        try {
            $result = "failed";
            $userObject = User::model()->findByAttributes(array("UserId"=>$userId));
            if($userObject->delete())
                $result = "success";
        } catch (Exception $ex) {
            error_log("########Exception Occurred while executing deleteDependentUser  in CoactiveService==############" . $ex->getMessage());
        }
        return $result;
    }

}

?>
