<?php

class UserTypes extends CActiveRecord {

    public $UserTypeId;
    public $Description;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'UserTypes';
    }

    public function getUserTypeById($id) {
        try {
            $query = "select * from UserTypes where UserTypeId = $id";
            $result = YII::app()->db->createCommand($query)->queryRow();            
        } catch (Exception $ex) {
            error_log("=========Exception Occurred==========getUserTypeById" . $ex->getMessage());
        }
        return $result;
    }

}

?>
