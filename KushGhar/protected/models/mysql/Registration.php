<?php

class Registration extends CActiveRecord {

    public $customer_id;
    public $first_name;
    public $midle_name;
    public $last_name;
    public $email_address;
    public $phone;
    public $alternate_phone;
    public $customer_gender;
    public $password_hash;
    public $password_salt;
    public $uId;
    public $uIdNumber;
    public $uIdDocument;
    public $birth_date;
    public $profilePicture;
    public $create_timestamp;
    public $update_timestamp;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Customer';
    }

    public function checkAuthentication($model) {
        // only checking with the email not the username; should have do with the username also... ;
        try {
            if(!is_numeric($model->UserId)){
                $user = Registration::model()->findByAttributes(array(), 'email_address=:email_address  AND password_hash=:password_hash', array(':email_address' => $model->UserId, ':password_hash' => md5($model->Password)));
                error_log("login----is not numeric-----".$model->UserId."------2-----".$model->Password);
            }else{
                $user = Registration::model()->findByAttributes(array(), 'phone=:phone AND password_hash=:password_hash', array(':phone' => $model->UserId, ':password_hash' => md5($model->Password)));
                error_log("login---is numeric------".$model->UserId."------2-----".$model->Password);
            }
            if (isset($user)) {
                $user->update_timestamp = gmdate("Y-m-d H:i:s", time());
                $user->update();
            }
        } catch (Exception $ex) {
            error_log("#########EXCEPTION OCCURRED IN CHECK AUTENTICATION########" . $ex->getMessage());
        }
        return $user;
    }

    public function getcheckEmailForPassword($model) {
        try {
            $user = Registration::model()->findByAttributes(array(), 'email_address=:email_address', array(':email_address' => $model->Email));
        } catch (Exception $ex) {
            error_log("#########EXCEPTION OCCURRED IN CHECK AUTENTICATION########" . $ex->getMessage());
        }
        return $user;
    }

    public function checkUserExist($model) {
        try {
            $user = Registration::model()->findByAttributes(array(), 'email_address=:email_address OR phone=:phone', array(':email_address' => $model->Email, ':phone' => $model->Phone));
            if (empty($user)) {
                $result = "No user";
                return $result;
            } else {
                $result = "yes user";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    }

    //New User Registration
    public function saveRegistrationData($model) {
        try {
            $sampleDetails = new Registration();
            $sampleDetails->first_name = $model->FirstName;
            $sampleDetails->last_name = $model->LastName;
            $sampleDetails->email_address = $model->Email;
            $sampleDetails->phone = $model->Phone;
            $sampleDetails->password_hash = md5($model->Password);
            $sampleDetails->password_salt = $model->Password;
            $sampleDetails->profilePicture = '/images/profile/none.jpg';
            $sampleDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $sampleDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($sampleDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    public function userDetailsEithEmail($email) {

        try {
            $userDetailsWithEmail = Registration::model()->findByAttributes(array('email_address' => $email));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $userDetailsWithEmail;
    }

    //Update Registration Data
    public function updateRegistrationData($model, $cId) {
        try {
            $RegObj = Registration::model()->findByAttributes(array('customer_id' => $cId));

            $RegObj->first_name = $model->FirstName;
            $RegObj->last_name = $model->LastName;
            $RegObj->middle_name = $model->MiddleName;
            if (!empty($model->Password)) {
                $RegObj->password_hash = md5($model->Password);
                $RegObj->password_salt = $model->Password;
            }
            $RegObj->customer_gender = $model->Gender;
            //$RegObj->uId = $model->IdentityProof;
            //$RegObj->uIdNumber = $model->Number;
            //$RegObj->uIdDocument = $model->uIdDocument;
            //$RegObj->birth_date = $model->dateOfBirth;
            $RegObj->birth_date = date('Y-m-d', strtotime($model->dateOfBirth));
            $RegObj->found_kushghar_by = $model->foundKushgharBy;
            $RegObj->found_kushghar_by_other=$model->foundKushgharByOther;

            $RegObj->profilePicture = $model->profilePicture;
            $RegObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            error_log("enter customerDetails Model======================");
            if ($RegObj->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result;
    }

    //Update Registration Data in Contact form
    public function updateRegistrationinContactData($model, $cId) {
        try {
            $RegObj = Registration::model()->findByAttributes(array('customer_id' => $cId));
            $RegObj->email_address = $model->Email;
            $RegObj->phone = $model->Phone;
            $RegObj->alternate_phone = $model->AlternatePhone;
            if ($RegObj->update())
                $result1 = "success";
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result1;
    }
    
    //Update Password in Basic Info form
    public function updatedPasswordInBasicInfo($model, $cId) {
        try {
            $RegObj = Registration::model()->findByAttributes(array('customer_id' => $cId));
            $RegObj->password_hash = md5($model->Password);
            $RegObj->password_salt = $model->Password;
            if ($RegObj->update())
                $result1 = "success";
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result1;
    }



    public function getCustomerDetails($id) {
        try {
            $customerDetails = Registration::model()->findByAttributes(array('customer_id' => $id));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $customerDetails;
    }

/*    public function getCustomerSaveDetails($email) {
        try {
            $customerDetails = Registration::model()->findByAttributes(array('email' => $email));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $customerDetails;
    }*/

}
?>
