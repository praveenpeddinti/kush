<?php

class Basicinfo extends CActiveRecord {

    public $Id;
    public $customerId;
    public $uId;
    public $uIdNumber;
    public $uIdDocument;
    public $DOB;
    public $profilePicture;
    public $Gender;
    public $customerQuestionId;
    public $createdDateTime;


    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'CustomerBasic';
    }

    //New Sample Data
    public function saveCustomerBasicDetails($model,$cId){
       
        try{error_log("enter save Basic info customer==================".$cId);
        $sampleDetails = new Basicinfo();
        $sampleDetails->customerId = $cId;
        $sampleDetails->uId = $model->IdentityProof;
        $sampleDetails->uIdNumber = $model->Number;
        $sampleDetails->Gender = $model->Gender;
        $sampleDetails->profilePicture = $model->profilePicture;
        error_log("CustomerDetails is====".$model->IdentityProof."===sno===".$model->Number."===cn===".$model->Gender."===ad===".$cId);
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
