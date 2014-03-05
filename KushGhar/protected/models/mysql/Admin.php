<?php

class Admin extends CActiveRecord {
    public $FirstName;
    public $LastName;
    public $MiddleName;
    public $UserName;
    public $Email;    
    public $Sex;
    public $DOB;
    public $EnrollmentDate;
    public $ProfilePic;
    public $SSN;    
    public $UserId;
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'Admin';
    }
    public function getAdminDetailsById($userId){
        $adminObj = Admin::model()->findByAttributes(array('UserId' => $userId));
        return $adminObj;
    }
    public function updateProfilePic($fileName, $userId) {
        $admin = Admin::model()->findByAttributes(array('UserId' => $userId));
        if (isset($admin)) {
            $admin->ProfilePic = $fileName;
            $admin->update();
        }
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
