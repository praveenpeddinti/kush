<?php

class KushGharService {

    public function login($model, $role) {
        try {
            //$user = array();
            if ($role == 'User') {
                $user = Registration::model()->checkAuthentication($model);
            }
            if ($role == 'Admin') {
                $user = Admin::model()->checkAuthentication($model);
            }
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

    /**
     * Vendor Service Layer Start
     */
    /* VENDOR TYPE--------------Individual  */
    //1. Checking the vendor exist ao not based on email_address
    public function getcheckVendorForIndividual($model) {
        try {
            $result = VendorIndividualRegistration::model()->getcheckVendorForIndividual($model);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }

    //2.Save the vendor individual details
    public function saveVendorForIndividualData($model) {
        try {
            $vendor = array();
            $vendor = VendorIndividualRegistration::model()->saveVendorIndividualData($model);
            if (!empty($vendor)) {
                return $vendor;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
    }

    public function getVendorDetailsWithEmailIndividual($email) {
        return VendorIndividualRegistration::model()->vendorDetailsEithEmailType1($email);
    }

    //2.Get Vendor Type1 details
    public function getVendorDetailsWithIndividual($Vid) {
        return VendorIndividualRegistration::model()->getVendorDetailsType1($Vid);
    }

    //3.Get Vendor Type1 Documents details
    public function getVendorDocumentsWithIndividual($Vid) {
        return VendorIndividualDocuments::model()->getVendorDocumentsWithIndividual($Vid);
    }

    //4. Update Vendor Type1 Details from basic Information Controller action
    public function updateVendorDetailsWithIndividual($model, $cId) {
        return VendorIndividualRegistration::model()->updateVendorDetailsWithIndividual($model, $cId);
    }

    /* VENDOR TYPE--------------Agency  */

    //1. Checking the vendor exist ao not based on email_address
    public function getcheckVendorForAgency($model) {
        try {
            $result = VendorAgencyRegistration::model()->getcheckVendorForAgency($model);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }

    //2.Save the vendor agency details
    public function saveVendorForAgencyData($model) {
        try {
            $vendor = array();
            $vendor = VendorAgencyRegistration::model()->saveVendorAgencyData($model);
            if (!empty($vendor)) {
                return $vendor;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
    }

    public function getVendorDetailsWithEmailAgency($email) {
        return VendorAgencyRegistration::model()->vendorDetailsEithEmailType1($email);
    }

    //3.Get Vendor Type2 details
    public function getVendorDetailsWithAgency($Vid) {
        return VendorAgencyRegistration::model()->getVendorDetailsType2($Vid);
    }

    //4. Update Vendor Type2 Details from basic Information Controller action
    public function updateVendorDetailsWithAgency($model, $cId) {
        return VendorAgencyRegistration::model()->updateVendorDetailsWithAgency($model, $cId);
    }

    /* Vendor Login Checking  */

    public function vendorLogin($model) {
        try {
            //$user = array();
            if ($model->VendorType == 1) {
                $vendor = VendorIndividualRegistration ::model()->checkAuthentication($model);
            } else {
                $vendor = VendorAgencyRegistration ::model()->checkAuthentication($model);
            }
            if (!empty($vendor)) {
                return $vendor;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        //return $user;
    }

    //Update Password vendor Individual 
    public function getupdatedPasswordInVendor($model, $VId, $VType) {
        return VendorIndividualRegistration::model()->updatedPasswordInVendor($model, $VId, $VType);
    }

    //Update Password vendor  Agency
    public function getupdatedPasswordInVendorAgency($model, $VId, $VType) {
        return VendorAgencyRegistration::model()->updatedPasswordInVendor($model, $VId, $VType);
    }

    //Save dump details in vendor address table for registration
    /* public function saveVendorAddressDumpInfo($vId,$vendorIndividualId) {
      return VendorBasicInformation::model()->saveVendorAddressDumpInfo($vId,$vendorIndividualId);
      } */

    /* VENDOR TYPE--------------Documents Details   */

    //Save dump details in vendor documents table for registration
    public function saveVendorDocumentsDumpInfo($vendorIndividualId, $vTypeId) {
        return VendorIndividualDocuments::model()->saveVendorDocumentsDumpInfo($vendorIndividualId, $vTypeId);
    }

//1. Update Vendor Documents Details from basic Information Controller action
    public function updateVendorDocuments($model, $cId) {
        return VendorIndividualDocuments::model()->updateVendorDocuments($model, $cId);
    }

    /* VENDOR TYPE--------------Address Details   */

    //Save dump details in vendor Address table for registration
    public function saveVendorAddressDumpInfo($vendorIndividualId, $vTypeId) {
        return VendorAddress::model()->saveVendorAddressDumpInfo($vendorIndividualId, $vTypeId);
    }

    //Contact  Information Details Start methods
    public function getVendorAddressDetails($vId, $vTypeId) {
        return VendorAddress::model()->getVendorAddressDetails($vId, $vTypeId);
    }

    // Update Vendor Address Details from contact Information Controller action
    public function updateVendorAddressDetails($model, $vId, $VType) {
        return VendorAddress::model()->updateVendorAddressDetails($model, $vId, $VType);
    }

    // Update Vendor Type1 Details from contact Information Controller action
    public function updateVendorDetailsWithIndividualContact($model, $vId) {
        return VendorIndividualRegistration::model()->updateVendorDetailsWithIndividualContact($model, $vId);
    }

    /**
     * Invitation users Start
     */
    /* VENDOR TYPE--------------Individual  */
    //1. Checking the vendor exist ao not based on email_address
    /* public function getcheckVendorForIndividual($model) {
      try {
      $result = VendorIndividualRegistration::model()->getcheckVendorForIndividual($model);
      } catch (Exception $ex) {
      error_log("=============exception occurred in login=============" . $ex->getMessage());
      }
      return $result;
      } */

    //2.Save the Invitation details
    public function getInvitationUser($model, $type) {
        try {
            $users = array();
            $users = InviteUser::model()->saveInvitationUser($model, $type);
            if (!empty($users)) {
                return $users;
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
    }

    /*
     * New Users invitations For Admin
     */

    public function getcheckNewUserExist($emailId) {
        try {
            $result = InviteUser::model()->checkNewUserExist($emailId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }

    public function getTotalUsers() {
        return InviteUser::model()->getTotalUsers();
    }

    public function getAllUsers($startLimit, $endLimit) {
        return InviteUser::model()->getAllUsers($startLimit, $endLimit);
    }

    public function getStatusUser($id, $val) {
        return InviteUser::model()->getStatusUser($id, $val);
    }

    public function sendInviteMailToUser($id, $val) {
        return InviteUser::model()->sendInviteMailToUser($id, $val);
    }

    /*
     * KushGhar Services start code
     */

    public function getServices() {
        return Services::model()->getServices();
    }
    
    // add new House cleaning Service
    public function addHouseCleaningService($model, $cId, $haveService) {
        return HouseCleaningService::model()->addHouseCleaningService($model, $cId, $haveService);
    }
    
    // update House cleaning Service
    public function updateHouseCleaningService($model, $cId, $haveService) {
        return HouseCleaningService::model()->updateHouseCleaningService($model, $cId, $haveService);
    }
    
    public function getDetails($cId) {
        return HouseCleaningService::model()->getServicesDetails($cId);
    }
    
    public function checkingHouseService($cId) {
        try {
            $result = HouseCleaningService::model()->checkingHouseService($cId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    
    // add new Car wash Service
    public function addCarWashService($model, $cId,$DL) {error_log("----enter model service---");
        return CarWashService::model()->addCarWashService($model, $cId,$DL);
    }
    
    public function getCarWashDetails($cId) {
        return CarWashService::model()->getServicesDetails($cId);
    }
    
    public function checkingCarService($cId) {
        try {
            $result = CarWashService::model()->checkingCarService($cId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    
    
    //add new Stewards Service
    public function addStewardsCleaningService($model, $cId) {
        return StewardsCleaningService::model()->addStewardsCleaningService($model, $cId);
    }
    
    // update Stewards cleaning Service
    public function updateStewardsCleaningService($model, $cId) {
        return StewardsCleaningService::model()->updateStewardsCleaningService($model, $cId);
    }
    
    public function getStewardsDetails($cId) {
        return StewardsCleaningService::model()->getServicesDetails($cId);
    }
    
    public function checkingStewardService($cId) {
        try {
            $result = StewardsCleaningService::model()->checkingStewardService($cId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    
    // Kushghar Services end code

}

?>
