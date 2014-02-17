<?php
class KushGharService{

    public function getIdentifyProof() {
        try {
            $result = ProofType::model()->getIdentifyProof();
        } catch (Exception $ex) {
            
        }
        return $result;
    }
    public function saveRegistrationData($model){
        error_log($model->FirstName."usersampleModel===".$model->Phone);
        return Registration::model()->saveRegistrationData($model);
    }

    //New Sample Data
    public function saveSampleData($model){
        error_log($model->SName."usersampleModel===".$model->CName);
        return Sample::model()->saveSampleDetails($model);
    }
    
    //Update Sample Data
    public function updateRegistrationData($model,$cId){
              error_log("dfdsfsdfsdf-----------");
        return Registration::model()->updateRegistrationData($model,$cId);
    }
   
    public function aboutUsDetails(){

        return Sample::model()->aboutUsDetails();
    }
    public function getCustomerDetails($id){
    error_log("id==ser==".$id);
        return Registration::model()->getCustomerDetails($id);
    }

    //View User Detials
    public function userDetails(){
        return Sample::model()->userDetails();
    }
    //Basic Information Details Start methods
     public function saveCustomerBasicDetails($model,$cId){
        error_log($model->FirstName."usersampleModel===".$model->Number);
        return Basicinfo::model()->saveCustomerBasicDetails($model,$cId);
    }
    //Basic Information Details Start methods

    //Basic Information Details Start methods
     public function saveCustomerInfoDetails($model,$cId){
        error_log($model->Address2."usersampleModel===".$model->Email);
        return ContactInfo::model()->saveCustomerInfoDetails($model,$cId);
    }
    //Update Sample Data
    public function updateRegistrationinContactData($model,$cId){
              error_log("dfdsfsdfsdf-----------");
        return Registration::model()->updateRegistrationinContactData($model,$cId);
    }
    //Basic Information Details Start methods
}
?>
