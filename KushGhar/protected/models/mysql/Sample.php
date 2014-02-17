<?php

class Sample extends CActiveRecord {

    public $Id;
    public $Sno;
    public $sname;
    public $cname;
    public $Address;
    public $Body;


    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'Sample';
    }

    //New Sample Data
    public function saveSampleDetails($model){
       
        try{
        $sampleDetails = new Sample();
        $sampleDetails->Sno = $model->SNo;
        $sampleDetails->sname = $model->SName;
        $sampleDetails->cname = $model->CName;
        $sampleDetails->Address = $model->Address;
        $sampleDetails->Sex = $model->Sex;
        error_log("Details is====".$model->SName."===sno===".$model->SNo."===cn===".$model->CName."===ad===".$model->Address."===sex==".$model->Sex);
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

     //Update Sample Data
     public function updateSampleData($model){
         try{
             $sampleObj = Sample::model()->findByAttributes(array('Id'=>$model->Id));
             $sampleObj->Sno = $model->SNo;
             $sampleObj->sname = $model->SName;
             $sampleObj->cname = $model->CName;
             $sampleObj->Address = $model->Address;
            if($sampleObj->update())
                $result = "success";

         }catch(Exception $ex){
             error_log("##########Exception Occurred updateData#############".$ex->getMessage());
         }
     }

    public function aboutUsDetails(){

        try{
        $query = "Select * from ClientDetails";
        $clientResult = YII::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("############Error Occurred= in getDetails= #############".$ex->getMessage());
        }
        return $clientResult;

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
