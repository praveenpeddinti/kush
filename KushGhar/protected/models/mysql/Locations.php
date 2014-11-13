<?php

class Locations extends CActiveRecord {
    public $Id;
    public $CityId;
    public $LocationName;
    public $Status;
        
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Locations';
    }
    public function getAllLocationsCount($CityId){
        try{
            $query="select count(*) as count from KG_Locations where CityId=".$CityId;
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Locations count##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getLocations($CityId,$startLimit,$endLimit){
        try{  
            $query="select * from KG_Locations where CityId=".$CityId." limit ".$startLimit.",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All locations list##############".$ex->getMessage());
        }
        return $result;
    }
    public function getCityNameByID($id){
        try{
            $query="select CityName from KG_Cities where Id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("############Error Occurred in Get city name by Id #############" . $ex->getMessage());
        }
        return $result;
    }
    public function ChangeLocationStatus($Id,$val){
        $result="failed";
       try{
           if($val==1)
                $query="update KG_Locations set Status=0 where Id=".$Id;
           else if ($val==0)
                $query="update KG_Locations set Status=1 where Id=".$Id;
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing status #########".$ex->getMessage());
       }
       return $result;
    }
    public function getLocationDetails($Id){
        try{
            $query="SELECT * FROM KG_Locations where Id=".$Id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        }
        catch (Exception $ex) {
            error_log("getCityDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    public function checkNewLocationExistInLocationTable($LocationName,$CityId){
        try {
            $result='';
            $newDetails = new Locations();
            $user = Locations::model()->findByAttributes(array(), 'LocationName=:LocationName and CityId=:CityId', array(':LocationName' => $LocationName,':CityId'=>$CityId));
            if (empty($user)) { $result = "No location";} 
            else {
                $result = "Yes location";
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred in location get Details= #############" . $ex->getMessage());
        }
        return $result; 
    }
    public function UpdateLocation($model){
        try{
            $query="Update KG_Locations set LocationName='".$model->LocationName."' where Id=".$model->Id;
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in update location Details= #############" . $ex->getMessage());
        }
    }
    public function newLocation($model){
        try{
            $query="INSERT INTO KG_Locations (CityId,LocationName,Status) VALUES (".$model->CityId.",'".$model->LocationName."',1)";
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in Add new location Details= #############" . $ex->getMessage());
        }
    }    
    public function getAllLocations() {
        try {
            $Criteria = new CDbCriteria();
            $Criteria->order = 'LocationName ASC';
            $Criteria->condition='Status=1';
            $cityData = CarModels::model()->findAll($Criteria);
        } catch (Exception $ex) {
            
        }
        return $cityData;
    }
    
    public function getSelectedLocations($CityName){
        try{            
            $query="select * from KG_Locations where CityName='$CityName' and Status=1";
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered locations##############".$ex->getMessage());
        }
        return $result;
    }
}?>