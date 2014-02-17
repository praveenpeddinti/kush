<?php

class ContactInfo extends CActiveRecord {

    public $Id;
    public $customerId;
    public $alternatePhoneNumber;
    public $AddressLine1;
    public $AddressLine2;
    public $stateId;
    public $city;
    public $pinCode;
    public $landmark;
    public $createdDateTime;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'CustomerContact';
    }

    //New Sample Data
    public function saveCustomerInfoDetails($model,$cId){
       
        try{error_log("enter save Basic info customer==================".$cId);
        $sampleDetails = new ContactInfo();
        $sampleDetails->customerId = $cId;
        $sampleDetails->alternatePhoneNumber = $model->AlternatePhone;
        $sampleDetails->AddressLine1 = $model->Address1;
        $sampleDetails->AddressLine2 = $model->Address2;
        $sampleDetails->stateId = $model->State;
        $sampleDetails->city = $model->City;
        $sampleDetails->pinCode = $model->PinCode;
        $sampleDetails->landmark = $model->Landmark;
        //$sampleDetails->createdDateTime = $model->profilePicture;
        if($sampleDetails->save()){
                $result = "success";
            }
             else {
                $result = "failed";
             }
     error_log("Cust  success data======");
        }catch(Exception $ex){
            error_log("##########Exception Occurred saveData#############".$ex->getMessage());
        }
        return $result;
    }

     
    public function getUserDetails($id){
            error_log("id==model==".$id);
        try{
//        $query = "Select * from Sample where Id = $id";
        $sample = Sample::model()->findByAttributes(array('Id'=>$id));
//        $userResult = YII::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("############Error Occurred= in usergetDetails= #############".$ex->getMessage());
        }
        return $sample;

    }

    //View User Details
    public function userDetails(){
        try{
            $query = "Select * from Sample";
            
        $userDetails = YII::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){

        }
        return $userDetails;
    }

    

}

?>
