<?php

class Admin extends CActiveRecord {
    public $Id;
    public $first_name;
    public $midle_name;
    public $last_name;
    public $email_address;
    public $phone;
    public $vendor_gender;
    public $password_hash;
    public $password_salt;
    public $birth_date;
    public $profilePicture;
    public $create_timestamp;
    public $update_timestamp;
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Admin';
    }
    
    public function checkAuthentication($model) {
        // only checking with the email not the username; should have do with the username also... ;
        try {
            if(!is_numeric($model->UserId)){
                $user = Admin::model()->findByAttributes(array(), 'email_address=:email_address  AND password_hash=:password_hash', array(':email_address' => $model->UserId, ':password_hash' => md5($model->Password)));
                
            }else{
                $user = Admin::model()->findByAttributes(array(), 'phone=:phone AND password_hash=:password_hash', array(':phone' => $model->UserId, ':password_hash' => md5($model->Password)));
                
            }
            if (isset($user)) {
                $user->update_timestamp = gmdate("Y-m-d H:i:s", time());
                $user->update();
            }
        } catch (Exception $ex) {
            error_log("#########EXCEPTION OCCURRED IN CHECK AUTENTICATION########" . $ex->getMessage());
        }
        return $user;
    }
    public function saveModel($model) {
        try{
        $admin = Admin::model()->findByAttributes(array('UserId' => $model->id));
        $admin->FirstName = $model->firstName;
                $admin->LastName = $model->lastName;
                $admin->UserName = $model->userName;
                if($admin->update()){
                    if ($result = User::model()->updateProfile($model)) {
                        ;
                    }
                }
        }catch(Exception $ex){
            error_log("############Error Occurred in saveModel Admin model###############".$ex->getMessage());
        }
        return $result;
    }
    public function getAdminDetails($userId){
        try{
        $query = "Select *, a.UserId,a.Logo,FirstName,LastName from Admin a JOIN User u on u.UserId = a.UserId where a.UserId = $userId";
        $adminResult = YII::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("############Error Occurred= in getAdminDetails= of Admin MODEL#############".$ex->getMessage());
        }
        return $adminResult;
    }
    
    
}

?>
