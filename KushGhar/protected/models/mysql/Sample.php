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
        return '';
    }

    

    

}

?>
