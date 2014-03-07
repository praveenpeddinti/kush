<?php

class KushGharService {

    public function login($model) {
        try {
            //$user = array();
            $user = Registration::model()->checkAuthentication($model);
            if (!empty($user)) {
                return $user;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        //return $user;
    }

    public function getcheckEmailForPassword($model) {
        try {
            //$user = array();
            $user = Registration::model()->getcheckEmailForPassword($model);
            if (!empty($user)) {
                return $user;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        //return $user;
    }

    public function getIdentifyProof() {
        try {
            $result = ProofType::model()->getIdentifyProof();
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }

    public function getStates() {
        try {
            $result = States::model()->getAllStates();
        } catch (Exception $ex) {
            error_log("=============exception occurred in state=============" . $ex->getMessage());
        }
        return $result;
    }

    public function getcheckUserExist($model) {
        try {
            $result = Registration::model()->checkUserExist($model);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }

    public function saveRegistrationData($model) {
        try {
            $user = array();
            $user = Registration::model()->saveRegistrationData($model);
            if (!empty($user)) {
                return $user;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
    }

    public function saveCustomerAddressDumpInfoDetails($cId) {
        return ContactInfo::model()->saveCustomerAddressDumpInfoDetails($cId);
    }

    public function saveCustomerPaymentDumpInfoDetails($cId) {
        return PaymentInfo::model()->saveCustomerPaymentDumpInfoDetails($cId);
    }

    public function getUserDetailsWithEmail($email) {
        return Registration::model()->userDetailsEithEmail($email);
    }

    //Update Sample Data
    public function updateRegistrationData($model, $cId) {
        error_log("dfdsfdsfds===========Service===");
        return Registration::model()->updateRegistrationData($model, $cId);
    }

    public function getCustomerDetails($id) {
        return Registration::model()->getCustomerDetails($id);
    }

    //Basic Information Details Start methods
    /* pra1public function saveCustomerBasicDetails($model,$cId){
      error_log($model->FirstName."usersampleModel===".$model->Number);
      return Basicinfo::model()->saveCustomerBasicDetails($model,$cId);
      } */
    //Basic Information Details Start methods
    //Basic Information Details Start methods
    public function saveCustomerInfoDetails($model, $cId) {
        return ContactInfo::model()->saveCustomerInfoDetails($model, $cId);
    }

    //Update Password in Basic Info Data
    public function getupdatedPasswordInBasicInfo($model, $cId) {
        return Registration::model()->updatedPasswordInBasicInfo($model, $cId);
    }
    //Update Sample Data
    public function updateRegistrationinContactData($model, $cId) {
        return Registration::model()->updateRegistrationinContactData($model, $cId);
    }

    //Basic Information Details Start methods
    public function getCustomerAddressDetails($id) {
        return ContactInfo::model()->getCustomerAddressDetails($id);
    }

    //Payment Details Start=======
    public function updateCustomerPaymentData($model, $cId) {
        return PaymentInfo::model()->updateCustomerPaymentData($model, $cId);
    }

    public function getCustomerPaymentDetails($id) {
        return PaymentInfo::model()->getCustomerPaymentDetails($id);
    }

    //payment Details End=========
}
?>
