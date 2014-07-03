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

    

}
?>