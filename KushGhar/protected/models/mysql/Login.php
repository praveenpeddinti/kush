<?php

class Login extends CActiveRecord {

    public $Id;
    public $email;
    public $phone;
    public $password;
   


    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Customer';
    }

    

}

?>
