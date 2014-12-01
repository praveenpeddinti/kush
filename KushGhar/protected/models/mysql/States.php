<?php

class States extends CActiveRecord {

    public $Id;
    public $StateName;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_States';
    }

    public function getAllStates() {
        try {
            $Criteria = new CDbCriteria();
            $Criteria->order = 'StateName ASC';
            $statesData = States::model()->findAll($Criteria);
        } catch (Exception $ex) {
            
        }
        return $statesData;
    }
    public function getAllStatesCount(){
        try{
            $query="select count(*) as count from KG_States";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Cities count##############".$ex->getMessage());
        }
        return $result['count'];
    }   
    public function getAllStatesView($startLimit,$endLimit){
        try{  
            $query="select * from KG_States limit ".$startLimit.",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Cities list##############".$ex->getMessage());
        }
        return $result;
    }
    public function getStateNameByID($StateId){
        try{
            $query="select StateName from KG_States where Id=".$StateId;
            $result=YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("#######Error occurred in fetching state name by state Id#####".$ex->getMessage());
        }
        return $result['StateName'];
    }
    public function getIdByStateName($stateName){
        try {
            $query = "select Id from KG_States where StateName='".$stateName."'";
            $result=YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("#######Error occurred in fetching state name by state Id#####".$ex->getMessage());
        }
        return $result['Id'];
    }
}
?>