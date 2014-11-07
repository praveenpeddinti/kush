<?php

class Cities extends CActiveRecord {
    public $Id;
    public $StateId;
    public $CityName;
    public $Status;
        
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Cities';
    }
    public function getAllCitiesCount(){
        try{
            $query="select count(*) as count from KG_Cities";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get car makes count##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllCities($startLimit,$endLimit){
        try{  
            $query="select * from KG_Cities limit ".$startLimit.",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All car makes list##############".$ex->getMessage());
        }
        return $result;
    }
    public function ChangeCityStatus($id,$val){
        $result="failed";
       try{
           if($val==1)
                $query="update KG_Cities set status=0 where Id=".$id;
           else if ($val==0)
                $query="update KG_Cities set status=1 where Id=".$id;
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing city status #########".$ex->getMessage());
       }
       return $result;
    }
    public function getCityDetails($id){
        try{
            $query="SELECT * FROM KG_Cities where id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        }
        catch (Exception $ex) {
            error_log("getCityDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    public function checkNewCityExistInCitiesTable($cityName){
        try {
            $result='';
            $newDetails = new Cities();
            $user = Cities::model()->findByAttributes(array(), 'CityName=:CityName', array(':CityName' => $cityName));
            if (empty($user)) { $result = "No city";} 
            else {
                $result = "Yes city";
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred in Make get Details= #############" . $ex->getMessage());
        }
        return $result; 
    }
    public function UpdateCity($model){
        try{
            $query="Update KG_Cities set CityName='".$model->CityName."' where Id=".$model->Id;
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in update make Details= #############" . $ex->getMessage());
        }
    }
    public function getCity(){
        
    }
}
?>