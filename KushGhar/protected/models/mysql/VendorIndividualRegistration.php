<?php

class VendorIndividualRegistration extends CActiveRecord {

    public $vendor_individual_id;
    public $vendor_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email_address;
    public $phone;
    public $business_primary_contact;
    public $vendor_gender;
    public $password_hash;
    public $password_salt;
    public $birth_date;
    public $services;
    public $profilePicture;
    public $pan_card;
    public $tin_number;
    public $website;
    public $security_question_one;
    public $security_question_two;
    public $security_question_three;
    public $create_timestamp;
    public $update_timestamp;
    public $found_kushghar_by;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_vendor_individual';
    }

    public function checkAuthentication($model) {
        // only checking with the email not the username; should have do with the username also... ;
        try {
            /* if(!is_numeric($model->UserId)){
              $vendor = VendorIndividualRegistration::model()->findByAttributes(array(), 'email_address=:email_address  AND password_hash=:password_hash', array(':email_address' => $model->UserId, ':password_hash' => md5($model->Password)));
              error_log("login----is not numeric-----".$model->UserId."------2-----".$model->Password);
              }else{
              $vendor = VendorIndividualRegistration::model()->findByAttributes(array(), 'phone=:phone AND password_hash=:password_hash', array(':phone' => $model->UserId, ':password_hash' => md5($model->Password)));
              error_log("login---is numeric------".$model->UserId."------2-----".$model->Password);
              } */
            $vendor = VendorIndividualRegistration::model()->findByAttributes(array(), 'email_address=:email_address  AND password_hash=:password_hash', array(':email_address' => $model->UserId, ':password_hash' => md5($model->Password)));
            if (isset($vendor)) {
                $vendor->update_timestamp = gmdate("Y-m-d H:i:s", time());
                $vendor->update();
            }
        } catch (Exception $ex) {
            error_log("#########EXCEPTION OCCURRED IN CHECK AUTENTICATION########" . $ex->getMessage());
        }
        return $vendor;
    }

    //Update Password in Vendor Individual
    public function updatedPasswordInVendor($model, $VId, $VType) {
        try {
            $vendorObj = VendorIndividualRegistration::model()->findByAttributes(array('vendor_id' => $VId));
            $vendorObj->password_hash = md5($model->Password);
            $vendorObj->password_salt = $model->Password;
            if ($vendorObj->update())
                $result1 = "success";
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result1;
    }

    public function getcheckVendorForIndividual($model) {
        try {
            $user = VendorIndividualRegistration::model()->findByAttributes(array(), 'email_address=:email_address OR phone=:phone', array(':email_address' => $model->Email, ':phone' => $model->Phone));
            if (empty($user)) {
                $result = "No vendor";
                return $result;
            } else {
                $result = "yes vendor";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    }

    //New Vendor Individual Registration
    public function saveVendorIndividualData($model) {
        try {
            $dd = Vendor::model()->getSavedetails($model->vendorType);
            $vendorDetails = new VendorIndividualRegistration();
            $vendorDetails->vendor_id = $dd;
            $vendorDetails->first_name = $model->FirstName;
            $vendorDetails->last_name = $model->LastName;
            $vendorDetails->email_address = $model->Email;
            $vendorDetails->phone = $model->Phone;
            $vendorDetails->password_hash = md5($model->Password);
            $vendorDetails->password_salt = $model->Password;
            $vendorDetails->profilePicture = '/images/profile/none.jpg';
            $vendorDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $vendorDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($vendorDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    public function vendorDetailsEithEmailType1($email) {
        try {
            $vendorDetailsWithEmail = VendorIndividualRegistration::model()->findByAttributes(array('email_address' => $email));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $vendorDetailsWithEmail;
    }

    public function getVendorDetailsType1($Vid) {
        try {
            $vendorDetails = VendorIndividualRegistration::model()->findByAttributes(array('vendor_id' => $Vid));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $vendorDetails;
    }

    //Update Vendor Type1 Details from basic Information Controller action4
    public function updateVendorDetailsWithIndividual($model, $VId) {
        try {
            $selectedOptions = '';
            for ($i = 0; $i < sizeof($model->Services); $i++)
                $selectedOptions = $selectedOptions . $model->Services[$i] . ',';
            $VendorObj = VendorIndividualRegistration::model()->findByAttributes(array('vendor_id' => $VId));
            $VendorObj->first_name = $model->FirstName;
            $VendorObj->last_name = $model->LastName;
            $VendorObj->middle_name = $model->MiddleName;
            $VendorObj->birth_date = date('Y-m-d', strtotime($model->dateOfBirth));
            $VendorObj->profilePicture = $model->profilePicture;
            $VendorObj->services = $selectedOptions;
            $VendorObj->vendor_gender = $model->Gender;
            $VendorObj->pan_card = $model->Pan;
            $VendorObj->tin_number = $model->Tin;
            $VendorObj->website = $model->Website;
            $VendorObj->found_kushghar_by = $model->foundKushgharBy;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($VendorObj->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result;
    }

    //Update Vendor Type1 Details from Contact Information Controller action
    public function updateVendorDetailsWithIndividualContact($model, $VId) {
        try {
            $VendorObj = VendorIndividualRegistration::model()->findByAttributes(array('vendor_id' => $VId));
            $VendorObj->email_address = $model->Email;
            $VendorObj->phone = $model->Phone;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($VendorObj->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result;
    }
}
?>
