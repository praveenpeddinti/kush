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
    public function getCityNameByID($id){
        try{
            $query="select CityName from KG_Cities where id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("############Error Occurred in Get make name by Id #############" . $ex->getMessage());
        }
        return $result;
    }
}