<?php

class KushGharService {

    public function login($model, $role) {
        try {
            if ($role == 'User') {
                $user = Registration::model()->checkAuthentication($model);
            }
            if ($role == 'Admin') {
                $user = Admin::model()->checkAuthentication($model);
            }
                return $user;
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        //return $user;
    }

    public function adminAsCustomerlogin($uname,$psw, $role) {
        try {error_log("---enter service--".$uname."==".$psw);
            if ($role == 'User') {
                $user = Registration::model()->checkAuthenticationAssumeCustomer($uname,$psw);
            }
            if ($role == 'Admin') {
                $user = Admin::model()->checkAuthenticationBackToAdmin($uname,$psw);
            }
            return $user;
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        //return $user;
    }
    public function getAdminDetails($id) {
        return Admin::model()->getAdminDetails($id);
    }
    public function getcheckEmailForPassword($model) {
        try {
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

    public function saveCustomerAddressDumpInfoDetails($location,$cId) {
        return ContactInfo::model()->saveCustomerAddressDumpInfoDetails($location,$cId);
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
    public function saveCustomerInfoDetails($model, $cId) {
        return ContactInfo::model()->saveCustomerInfoDetails($model, $cId);
    }
    
    //Update the contact info Details by the time of House cleaning and stewards service pages submitted Start methods
    public function updateCcontactInfoDetailsByServices($model, $cId) {
        return ContactInfo::model()->updateCcontactInfoDetailsByServices($model, $cId);
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
            return $vendor;
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
    public function saveVendorDocumentsDumpInfo($vendorIndividualId, $model) {
        return VendorIndividualDocuments::model()->saveVendorDocumentsDumpInfo($vendorIndividualId, $model);
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

    public function getTotalUsers($uname,$phone,$status) {
        return InviteUser::model()->getTotalUsers($uname,$phone,$status);
    }

    public function getAllUsers($startLimit, $endLimit,$uname,$phone,$status) {
        return InviteUser::model()->getAllUsers($startLimit, $endLimit,$uname,$phone,$status);
    }
    
    /*
     * Invoice management details
     */
    public function getTotalInvoice($oNumber,$invoiceNo,$status) {
        return InvoiceDetails::model()->getTotalInvoice($oNumber,$invoiceNo,$status);
    }

    public function getAllInvoice($startLimit, $endLimit,$oNumber,$invoiceNo,$status) {
        return InvoiceDetails::model()->getAllInvoice($startLimit, $endLimit,$oNumber,$invoiceNo,$status);
    }

    public function getStatusUser($id, $val) {
        return InviteUser::model()->getStatusUser($id, $val);
    }

    public function sendInviteMailToUser($id, $val) {
        return InviteUser::model()->sendInviteMailToUser($id, $val);
    }
    
    public function getInviteUserDetailWithEmail($email) {
        return InviteUser::model()->getInviteUserDetailWithEmail($email);
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
    public function addCarWashService($model, $cId,$DL) {
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
   
    
    public function getcustomerServicesHouse($cId) {
        try{
        $result = HouseCleaningService::model()->getcustomerServicesHouse($cId);
        }catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function getcustomerServicesCar($cId) {
        try{
            $result =  CarWashService::model()->getcustomerServicesCar($cId);
        }catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function getcustomerServicesStewards($cId) {
        try{
            $result = StewardsCleaningService::model()->getcustomerServicesStewards($cId);
        }catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
        } 
        
        
        public function getcustomerServicesHouseStatus($cId) {
        try{
            $result = HouseCleaningService::model()->getcustomerServicesHouseStatus($cId);
        }catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function getcustomerServicesCarStatus($cId) {
        try{
            $result = CarWashService::model()->getcustomerServicesCarStatus($cId);
        }catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function getcustomerServicesStewardsStatus($cId) {
        try{
            $result = StewardsCleaningService::model()->getcustomerServicesStewardsStatus($cId);
            }catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    
    /*
     * Order Details queries start
     */
     
    public function getOrderDetailsMaxParentId() {
        return OrderDetails::model()->getOrderDetailsMaxParentId();
    }
    // add new Order Parent 
    public function storeOrderDetailsOfParent($cId) {
        return OrderDetails::model()->storeOrderDetailsOfParent($cId);
    }
    
    //add House Service with parent id
    public function storeOrderDetailsOfHouse($cId,$parentId,$CustId,$orderNo,$serviceId,$amount,$servicedate) {
        return OrderDetails::model()->storeOrderDetailsOfHouse($cId,$parentId,$CustId,$orderNo,$serviceId,$amount,$servicedate);
    }
      //Order Details queries end   
    
    
    //update Services in Order palced--------------------
    public function storeOrdernumberofHouse($cId,$orderId,$orderNo) {
        return HouseCleaningService::model()->storeOrdernumberofHouse($cId,$orderId,$orderNo);
    }
    public function storeOrdernumberofStewards($cId,$orderId,$orderNo) {
        return StewardsCleaningService::model()->storeOrdernumberofStewards($cId,$orderId,$orderNo);
    }
    public function storeOrdernumberofCar($cId,$orderId,$orderNo) {
        return CarWashService::model()->storeOrdernumberofCar($cId,$orderId,$orderNo);
    }
    
    //////////Order details start////////////
    public function getOrderDetails($cId) {
        return HouseCleaningService::model()->getOrderDetails($cId);
    }
    /////////////////////////////////////////
    
    public function getOrderDetailsinAdmin($start,$end,$type,$orderNo,$status) {
        return HouseCleaningService::model()->getOrderDetailsinAdmin($start,$end,$type,$orderNo,$status);
    }
    
    
    public function getTotalOrders($stype,$orderNo,$status) {
        return OrderDetails::model()->getTotalOrders($stype,$orderNo,$status);
    }
    
    public function sendorderStatus($id, $val) {
        return OrderDetails::model()->sendorderStatus($id, $val);
    }
    
    //View the Service details for Customer
    public function getOrderHServicesDetails($oId) {
        return OrderDetails::model()->getOrderHServicesDetails($oId);
    }
    public function getOrderSServicesDetails($oId) {
        return OrderDetails::model()->getOrderSServicesDetails($oId);
    }
    public function getOrderCServicesDetails($oId) {
        return OrderDetails::model()->getOrderCServicesDetails($oId);
    }
    // Customer Side Order details
    public function getTotalOrdersForCustomer($stype,$orderNo,$cId) {
        return OrderDetails::model()->getTotalOrdersForCustomer($stype,$orderNo,$cId);
    }
    public function getOrderDetailsForCustomer($start,$end,$type,$orderNo,$cId) {
        return HouseCleaningService::model()->getOrderDetailsForCustomer($start,$end,$type,$orderNo,$cId);
    }
    public function getRegisteredUser($uname,$city,$location,$status){
        return InviteUser::model()->getRegisteredUser($uname,$city,$location,$status);
    }
    public function getAllRegisteredUsers($startLimit, $endLimit,$uname,$city,$location,$status) {
        return InviteUser::model()->getAllRegisteredUsers($startLimit, $endLimit,$uname,$city,$location,$status);
    }
    public function ChangeStatusUser($id, $val) {
        return InviteUser::model()->ChangeStatusUser($id, $val);
    }
    public function getFullUserDetails($id){
        return InviteUser::model()->getFullUserDetails($id);
    } 
    public function getRegisteredVendorUser($uname,$location,$status){
        return InviteUser::model()->getRegisteredVendorUser($uname,$location,$status);
    }
    public function getAllRegisteredVendorUsers($startLimit, $endLimit,$uname,$location,$status){
        return InviteUser::model()->getAllRegisteredVendorUsers($startLimit, $endLimit,$uname,$location,$status);
    }
    public function ChangeVendorStatus($id, $val) {
        return InviteUser::model()->ChangeVendorStatus($id, $val);
    }
    public function getRegisteredAgencyVendorUser($uname,$location,$status){
        return InviteUser::model()->getRegisteredAgencyVendorUser($uname,$location,$status);
    }
    public  function getAllRegisteredAgencyVendorUsers($startLimit, $endLimit,$uname,$location,$status){
        return InviteUser::model()->getAllRegisteredAgencyVendorUsers($startLimit, $endLimit,$uname,$location,$status);
    }
    public function ChangeAgencyStatus($id, $val) {
        return InviteUser::model()->ChangeAgencyStatus($id, $val);
    }
    public function getInvitationFriendUser($model, $type) {
        try {
            $users = array();
            $users = InviteUser::model()->saveInvitationFriendUser($model, $type);
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
     * @praveen Delete House cleaning when the service is not selected (i.e once service is selected but not place order again service is not selected).
     */
    public function deleteHouseService($cId) {
        try {
            $result = HouseCleaningService::model()->deleteHouseService($cId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function deleteCarService($cId) {
        try {
            $result = CarWashService::model()->deleteCarService($cId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function deleteStewardService($cId) {
        try {
            $result = StewardsCleaningService::model()->deleteStewardService($cId);
        } catch (Exception $ex) {
            error_log("=============exception occurred in login=============" . $ex->getMessage());
        }
        return $result;
    }
    public function checkNewUserExistInInviteTable($email) {
        return InviteUser::model()->checkNewUserExistInInviteTable($email);
    }
    public function checkNewUserExistInCustomerTable($email) {
        return Registration::model()->checkNewUserExistInCustomerTable($email);
    }
    public function cancelUserOrderStatus($id) {
        return OrderDetails::model()->cancelUserOrderStatus($id);
    }
    public function getServiceType($id){
        return OrderDetails::model()->getServiceType($id);
    }
    public function rescheduleHouseCleaning($serviceTime,$OrderNumber){
        return OrderDetails::model()->rescheduleHouseCleaning($serviceTime,$OrderNumber);
    }
    public function rescheduleCarWah($serviceTime,$OrderNumber){
        return OrderDetails::model()->rescheduleCarWah($serviceTime,$OrderNumber);
    }
    public function rescheduleStewards($startTime,$endTime,$duration,$OrderNumber){
        return OrderDetails::model()->rescheduleStewards($startTime,$endTime,$duration,$OrderNumber);
    }
    public function getServiceDetails($ordernumber,$type){
        return OrderDetails::model()->getServiceDetails($ordernumber,$type);
    }
    public function reviewSave($model){
        return OrderReviews::model()->addCustomerReview($model);
    }
    public function getUserReviews(){
        return OrderReviews::model()->getUserReviews();
    }
    public function getAllUsersReviews($startLimit, $endLimit){
        return OrderReviews::model()->getAllUsersReviews($startLimit, $endLimit);
    }
    public function getReviewExist($id){
        return OrderReviews::model()->getReviewExist($id);
    }
    /*
     * @Praveen Order status is closed that time store the total time and total peoples in DB 4-Aug-14
     */
    public function sendorderStatusWithTimeAndPeople($model, $val) {
        return OrderDetails::model()->sendorderStatusWithTimeAndPeople($model, $val);
    }
    /*
    * @Praveen feedback is published in the home page when the check the is publish checkbox in User review/feedback tab in admin side
    */
    public function getIspublishReview($id, $val) {
        return OrderReviews::model()->getIspublishReview($id, $val);
    }

    
    /*
     * @Praveen feedback details show in home page 
     */

    public function getFeedbackPublished(){
        return Services::model()->getFeedbackPublished();
    }
    public function getFeedbacksTotal5() {
        return Services::model()->getFeedbacksTotal5();
    }
    public function getFeedbacks($startLimit, $endLimit){
        return Services::model()->getFeedbacks($startLimit, $endLimit);
    }
    



    public function getCarMakes(){
        return CarMakes::model()->getcarMakes();
    }
    public function getAllCarMakes($startLimit, $endLimit){
        return CarMakes::model()->getAllCarMakes($startLimit, $endLimit);
    }
    public function ChangeMakeStatus($id,$status){
        return CarMakes::model()->ChangeMakeStatus($id,$status);
    }
    public function getMakeDetails($id){
        return CarMakes::model()->getMakeDetails($id);
    }
    public function checkNewMakeExistInMakeTable($make_name){
        return CarMakes::model()->checkNewMakeExistInMakeTable($make_name);
    }
    public function UpdateMake($model){
        return CarMakes::model()->UpdateMake($model);
    }
    public function  NewMake($model){
        return CarMakes::model()->NewMake($model);
    }
    public function getCarModels($makeId){
        return CarModels::model()->getCarModels($makeId);
    }
    public function getAllCarModels($makeId,$startLimit, $endLimit){
        return CarModels::model()->getAllCarModels($makeId,$startLimit, $endLimit);
    }
    public function getSelectedCarModels($makeName){
        return CarModels::model()->getSelectedCarModels($makeName);
    }
    public function getMakes() {
        try {
            $result = CarMakes::model()->getAllMakes();
        } catch (Exception $ex) {
            error_log("=============exception occurred in Makes=============" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getModels() {
        try {
            $result = CarModels::model()->getAllModels();
        } catch (Exception $ex) {
            error_log("=============exception occurred in Makes=============" . $ex->getMessage());
        }
        return $result;
    }
    public function ChangeModelStatus($id,$status){
        return CarModels::model()->ChangeModelStatus($id,$status);
    }
    public function getModelDetails($id){
        return CarModels::model()->getModelDetails($id);
    }
    public function checkNewModelExistInModelTable($model_name,$makeid){
        return CarModels::model()->checkNewModelExistInModelTable($model_name,$makeid);
    }
    public function UpdateModel($model){
        return CarModels::model()->UpdateModel($model);
    }
    public function newModel($model,$makename){
        return CarModels::model()->newModel($model,$makename);
    }
    public function getFullVendorDetails($id){
        return InviteUser::model()->getFullVendorDetails($id);
    } 
    public function getOrderDetailsById($id){
        return OrderDetails::model()->getOrderDetailsById($id);
    }
    public function getAllVendors(){
        return VendorIndividualRegistration::model()->getAllVendors();
    }
    public function sendorderScheduleStatus($id,$status,$vendorVals){
        return OrderDetails::model()->sendorderScheduleStatus($id,$status,$vendorVals);
    }
    public function getMakeNameByID($id){
        return CarModels::model()->getMakeNameByID($id);
    }
    public function getServiceDetailsofHouseCleaning($orderID){
        return HouseCleaningService::model()->getServiceDetailsofHouseCleaning($orderID);
    }
    public function getVendorDetails($Id,$vendors) {
        return OrderDetails::model()->getVendorDetails($Id,$vendors);
    }
    public function getReviewDetails($OId) {
        return OrderReviews::model()->getReviewDetails($OId);
    }
    
    /*
     * @Invoice details
     */
    public function getInvoiceDetailsMaxId(){
        return InvoiceDetails::model()->getInvoiceDetailsMaxId();
    }
    
    public function storeInvoiceDetails($CustId,$ServiceId,$OrderNo,$Amount,$InvoiceNo){
        return InvoiceDetails::model()->storeInvoiceDetails($CustId,$ServiceId,$OrderNo,$Amount,$InvoiceNo);
    }
    public function getInvoiceDetails($OrderId){
        return InvoiceDetails::model()->getInvoiceDetails($OrderId);
    }
    
    public function getPaidInvoice($id, $val) {
        return InvoiceDetails::model()->getPaidInvoice($id, $val);
    }
    
    /*
     * Payment details for Invoice
     */
    public function getTotalPayments(){
        return InvoiceDetails::model()->getTotalPayments();
    }
    
    public function getAllPayments($startLimit, $endLimit) {
        return InvoiceDetails::model()->getAllPayments($startLimit, $endLimit);
    }
    public function UpdateClrPfDocument($id,$type,$number,$doc){
        return VendorIndividualDocuments::model()->UpdateClrPfDocument($id,$type,$number,$doc);
    }
    public function ApproveVendor($id){
        return VendorIndividualRegistration::model()->ApproveVendor($id);
    }
    /*
     * @Praveen Update the Order in admin actions order tab
     */
    public function getUpdateOrderforServicesDetails($OrderNo) {
        return HouseCleaningService::model()->getUpdateOrderforServicesDetails($OrderNo);
    }
    
    public function updateorderStatusWithAdmin($model) {
        return HouseCleaningService::model()->updateorderStatusWithAdmin($model);
    }
    public function updateorderAmountWithAdmin($model,$Amount,$Type) {
        return InvoiceDetails::model()->updateorderAmountWithAdmin($model,$Amount,$Type);
    }
    
} ?>