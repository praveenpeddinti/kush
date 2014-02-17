<?php

class Registration extends CActiveRecord {

    public $Id;
    public $firstname;
    public $midleName;
    public $lastName;
    public $email;
    public $phone;
    public $password;
    public $createdDateTime;


    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Users';
    }

    //New User Registration
    public function saveRegistrationData($model){
        try{
        $sampleDetails = new Registration();
        $sampleDetails->firstName = $model->FirstName;
        $sampleDetails->lastName = $model->LastName;
        $sampleDetails->email = $model->Email;
        $sampleDetails->phone = $model->Phone;
        $sampleDetails->password = $model->Password;
        
        error_log("Details is====".$model->FirstName."===sno===".$model->LastName."===cn===".$model->Email."===ad===".$model->Phone."===sex==".$model->Password);
        if($sampleDetails->save()){
                $result = "success";
            }
             else {
                $result = "failed";
             }
     error_log("success data======");
        }catch(Exception $ex){
            error_log("##########Exception Occurred saveData#############".$ex->getMessage());
        }
        return $result;
    }

    //Update Registration Data
     public function updateRegistrationData($model,$cId){
         try{error_log("enter update customer==================".$cId);
             $RegObj = Registration::model()->findByAttributes(array('Id'=>$cId));
             $RegObj->firstName = $model->FirstName;
             $RegObj->lastName = $model->LastName;
             $RegObj->middleName = $model->MiddleName;
             $RegObj->password = $model->Password;
            if($RegObj->update())
                $result1 = "success";

         }catch(Exception $ex){
             error_log("##########Exception Occurred updateData#############".$ex->getMessage());
         }
         return $result1;
     }


     //Update Registration Data in Contact form
     public function updateRegistrationinContactData($model,$cId){
         try{error_log("enter update customer==================".$cId."===".$model->Email."===".$model->Phone);
             $RegObj = Registration::model()->findByAttributes(array('Id'=>$cId));
             $RegObj->email = $model->Email;
            $RegObj->phone = $model->Phone;
            if($RegObj->update())
                $result1 = "success";

         }catch(Exception $ex){
             error_log("##########Exception Occurred updateData#############".$ex->getMessage());
         }
         return $result1;
     }

    public function getCustomerDetails($id){
            error_log("id==model==".$id);
        try{
//        $query = "Select * from Sample where Id = $id";
        $customerDetails = Registration::model()->findByAttributes(array('Id'=>$id));
//        $userResult = YII::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("############Error Occurred= in usergetDetails= #############".$ex->getMessage());
        }
        return $customerDetails;

    }

     

    

}

?>
