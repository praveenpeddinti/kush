<?php

class Contact extends CActiveRecord {

    public $Id;
    public $Name;
    public $Email;
    public $Subject;
    public $Body;


    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'AdminContacts';
    }

    public function saveAdminContact($model){
        $result = "failed";
        try{
        $adminContact = new Contact();
        $user = Contact::model()->findByAttributes(array('Email' => $model->Email));
        
        if ($user == false) {
//                User::model()->updatePassword
            $adminContact->Name = $model->Name;
            $adminContact->Email = $model->Email;
            $adminContact->Subject = $model->Subject;
            $adminContact->Body = $model->Body;

            if($adminContact->save()){
                $result = "success";
            }
            } else {
                $result = "failed";
            }
            
            // save condition ...
            

        
        }catch(Exception $ex){
            error_log("##########Exception Occurred saveAdminContact#############".$ex->getMessage());
        }
        return $result;
    }

    public function checkContactData($model) {
        // only checking with the email not the username; should have do with the username also... ;
        try {
            $user = Contact::model()->findByAttributes(array('Email' => $model->Email));
            if (isset($user)) {
                //$user->LastLoginOn = gmdate("Y-m-d H:i:s", time());
                $user->update();
            }
        } catch (Exception $ex) {
            error_log("#########EXCEPTION OCCURRED IN CHECK AUTENTICATION########" . $ex->getMessage());
        }
        return $user;
    }

}

?>
