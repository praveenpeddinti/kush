<?php

class Services extends CActiveRecord {

    public $Id;
    public $name;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Services';
    }

    public function getServices() {
        try {
            $serviceTypes = Services::model()->findAll();
        } catch (Exception $ex) {
            
        }
        return $serviceTypes;
    }

    

}
?>