<?php

class CarMakes extends CActiveRecord {
    public $Id;
    public $make_name;
    public $status;
        
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Car_make';
    }
    public function getCarMakes(){
        try{
            $query="select count(*) as count from KG_Car_make";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get car makes count##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllCarMakes($startLimit, $endLimit){
        try{  
            $query="select * from KG_Car_make limit ".$startLimit.",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All car makes list##############".$ex->getMessage());
        }
        return $result;
    } 
    public function ChangeMakeStatus($id, $val) {
       $result="failed";
       try{
           if($val==1)
                $query="update KG_Car_make set status=0 where id=".$id;
           else if ($val==0)
                $query="update KG_Car_make set status=1 where id=".$id;
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing car make status #########".$ex->getMessage());
       }
       return $result;
    }
    public function getMakeDetails($id){
        try{
            $query="SELECT * FROM KG_Car_make where id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        }
        catch (Exception $ex) {
            error_log("getMakeDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    public function checkNewMakeExistInMakeTable($make_name){
       try {
            $result='';
            $newDetails = new CarMakes();
            $user = CarMakes::model()->findByAttributes(array(), 'make_name=:make_name', array(':make_name' => $make_name));
            if (empty($user)) { $result = "No make";} 
            else {
                $result = "Yes make";
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred in Make get Details= #############" . $ex->getMessage());
        }
        return $result; 
    }
    public function UpdateMake($model){
        try{
            $query="Update KG_Car_make set make_name='".$model->make_name."' where id=".$model->makeId;
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in update make Details= #############" . $ex->getMessage());
        }
    }
    public function NewMake($model){
        try{
            $query="INSERT INTO KG_Car_make (make_name) VALUES ('".$model->model_name."')";
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in Add new make Details= #############" . $ex->getMessage());
        }
    }
    public function getAllMakes() {
        try {
            $Criteria = new CDbCriteria();
            $Criteria->order = 'make_name ASC';
            $makesData = CarMakes::model()->findAll($Criteria);
        } catch (Exception $ex) {
            
        }
        return $makesData;
    }

}?>