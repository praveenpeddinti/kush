<?php

class InviteUser extends CActiveRecord {

    public $first_name;
    public $last_name;
    public $email_address;
    public $phone;
    public $status;
    public $invite;
    public $services;
    public $location;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_InvitationUsers';
    }

    public function checkNewUserExist($emailId) {
        try {
            $result='';
            $newDetails = new InviteUser();
            $user = InviteUser::model()->findByAttributes(array(), 'email_address=:email_address', array(':email_address' => $emailId));
            $newDetails->email_address = $emailId;
            $newDetails->invite = 1;
            if (empty($user)) {
                $newDetails->save();
                $result = "No user";
                
            } else {
                $result = "yes user";
                
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    } 

    public function saveInvitationUser($model,$type) {
        $result = "false";
        $selectedOptions='';
        if($model->HServices==1)
            $selectedOptions = $selectedOptions.'1'.',';
        if($model->CServices==1)
            $selectedOptions = $selectedOptions.'2'.',';
        if($model->SServices==1)
            $selectedOptions = $selectedOptions.'3'.',';
        //$user = InviteUser::model()->findByAttributes(array('email_address' => $model->Email));
        $user = InviteUser::model()->findByAttributes(array(), 'email_address=:email_address  OR phone=:phone', array(':email_address' => $model->Email, ':phone' => $model->Phone));
                
        if (!isset($user)) {
            try {
                $user = new InviteUser();
                              
                $user->first_name = stripcslashes($model->FirstName);
                $user->last_name = stripcslashes($model->LastName);
                $user->email_address = stripcslashes($model->Email);
                $user->phone = stripcslashes($model->Phone);
                $user->type = stripcslashes($type);
                $user->services = $selectedOptions;
                $user->invite = 0;
                $user->location = $model->Location;
                $user->create_timestamp = gmdate("Y-m-d H:i:s", time());
                
                if (!$user->save())
                    $result = "false";//return CHtml::errorSummary($this);
                else
                    $result = "success";
            } catch (Exception $ex) {
                error_log("=====Exception occurred in saveModel====" . $ex->getMessage());
            }
        }
        return $result;
    }

    public function getInviteUserDetailWithEmail($email) {

        try {
            $InviteUserDetailsWithEmail = InviteUser::model()->findByAttributes(array('email_address' => $email));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $InviteUserDetailsWithEmail;
    }
    
   public function getTotalUsers(){
        try{            
            $query = "SELECT count(*) as count FROM KG_InvitationUsers";
                   
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    } 
   public function getAllUsers($start,$end){
        try{            
            $query = "SELECT * FROM KG_InvitationUsers where status =1 ORDER BY id DESC limit ".$start. ",".$end;
                
            $result = Yii::app()->db->createCommand($query)->queryAll();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function getStatusUser($id,$val){
        //if($val==0){$status=1;}
        //if($val==1){$status=0;}
        $result = "failed";
        try{
            $InviteObj = InviteUser::model()->findByAttributes(array('Id'=>$id));
            //$InviteObj->status = $status;
            if($InviteObj->delete())
            //if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    public function sendInviteMailToUser($id,$val){
        if($val==0){$status=1;}
        if($val==1){$status=2;}
        if($val==2){$status=2;}
        $result = "failed";
        try{
            $InviteObj = InviteUser::model()->findByAttributes(array('Id'=>$id));
            $InviteObj->invite = $status;
            if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }

}

?>
