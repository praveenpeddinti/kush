<?php

class VendorAgencyRegistration extends CActiveRecord {

    public $vendor_business_id;
    public $vendor_id;
    public $legal_name;
    public $first_name;
    public $midle_name;
    public $last_name;
    public $email_address;
    public $phone;
    public $year_business_started;
    public $certificate_image_file_location;
    public $vendor_gender;
    public $password_hash;
    public $password_salt;
    public $birth_date;
    public $create_timestamp;
    public $update_timestamp;
    public $found_kushghar_by;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_vendor_business';
    }

    public function checkAuthentication($model) {
        // only checking with the email not the username; should have do with the username also... ;
        try {
            if(!is_numeric($model->UserId)){
                $vendor = VendorAgencyRegistration::model()->findByAttributes(array(), 'email_address=:email_address  AND password_hash=:password_hash', array(':email_address' => $model->UserId, ':password_hash' => md5($model->Password)));
                error_log("login----is agencynot numeric-----".$model->UserId."------2-----".$model->Password);
            }else{
                $vendor = VendorAgencyRegistration::model()->findByAttributes(array(), 'phone=:phone AND password_hash=:password_hash', array(':phone' => $model->UserId, ':password_hash' => md5($model->Password)));
                error_log("login---is agencynumeric------".$model->UserId."------2-----".$model->Password);
            }
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
    public function updatedPasswordInVendor($model, $VId,$VType) {
        try {
            $vendorObj = VendorAgencyRegistration::model()->findByAttributes(array('vendor_id' => $VId));
            $vendorObj->password_hash = md5($model->Password);
            $vendorObj->password_salt = $model->Password;
            if ($vendorObj->update())
                $result1 = "success";
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result1;
    }


    public function getcheckVendorForAgency($model) {
        try {error_log("check vender---------");
            $user = VendorAgencyRegistration::model()->findByAttributes(array(), 'email_address=:email_address OR phone=:phone', array(':email_address' => $model->Email, ':phone' => $model->Phone));
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

     //New Vendor Agency Registration
    public function saveVendorAgencyData($model) {
        try {
            $dd=Vendor::model()->getSavedetails($model->vendorType);
            error_log("fddffdfgf=====".$dd);
            $vendorDetails = new VendorAgencyRegistration();
            $vendorDetails->vendor_id = $dd;
            $vendorDetails->legal_name = $model->AgencyName;
            $vendorDetails->first_name = $model->PrimaryContactFirstName;
            $vendorDetails->last_name = $model->PrimaryContactLastName;
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
            $vendorDetailsWithEmail = VendorAgencyRegistration::model()->findByAttributes(array('email_address' => $email));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $vendorDetailsWithEmail;
    }

    public function getVendorDetailsType2($Vid) {
        try {
            $vendorDetails = VendorAgencyRegistration::model()->findByAttributes(array('vendor_id' => $Vid));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $vendorDetails;
    }

    //Update Vendor Type2 Details from basic Information Controller action4
    public function updateVendorDetailsWithAgency($model, $VId) {
        try {error_log("1enter VendorDetails Model======================");
            $VendorObj = VendorAgencyRegistration::model()->findByAttributes(array('vendor_id' => $VId));

            $VendorObj->first_name = $model->PrimaryContactFirstName;
            $VendorObj->last_name = $model->PrimaryContactLastName;
            $VendorObj->middle_name = $model->PrimaryContactMiddleName;
            $VendorObj->legal_name = $model->AgencyName;
            $VendorObj->birth_date = date('Y-m-d', strtotime($model->dateOfBirth));
            $VendorObj->profilePicture = $model->profilePicture;
            $VendorObj->vendor_gender = $model->Gender;
            $VendorObj->pan_card = $model->Pan;
            $VendorObj->tin_number = $model->Tin;
            $VendorObj->website = $model->Website;
            //$RegObj->uId = $model->IdentityProof;
            //$RegObj->uIdNumber = $model->Number;
            //$RegObj->uIdDocument = $model->uIdDocument;
            //$RegObj->birth_date = $model->dateOfBirth;
            $VendorObj->found_kushghar_by = $model->foundKushgharBy;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            error_log("enter VendorDetails Model======================");
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


     //Update Vendor Type2 Details from Contact Information Controller action
    public function updateVendorDetailsWithIndividualContact($model, $VId) {
        try {error_log("1enter VendorDetails Model======================");
            $VendorObj = VendorAgencyRegistration::model()->findByAttributes(array('vendor_id' => $VId));

            $VendorObj->email_address = $model->Email;
            $VendorObj->phone = $model->Phone;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            error_log("enter VendorDetails Model======================");
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
