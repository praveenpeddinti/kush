<?php

class InviteUser extends CActiveRecord {

    public $first_name;
    public $last_name;
    public $email_address;
    public $status;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_InvitationUsers';
    }

    public function checkNewUserExist($emailId) {
        try {error_log("email id is model====".$emailId);
            $result='';
            $newDetails = new InviteUser();
            $user = InviteUser::model()->findByAttributes(array(), 'email_address=:email_address', array(':email_address' => $emailId));
            $newDetails->email_address = $emailId;
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
        $user = InviteUser::model()->findByAttributes(array('email_address' => $model->Email));
        
        error_log($model->LastName."*********************************firt name");
        if (!isset($user)) {
            try {
                $user = new InviteUser();
                
                
                $user->first_name = stripcslashes($model->FirstName);
                $user->last_name = stripcslashes($model->LastName);
                $user->email_address = stripcslashes($model->Email);
                $user->type = stripcslashes($type);
                $user->create_timestamp = gmdate("Y-m-d H:i:s", time());
                
                if (!$user->save())
                    $result = "false";//return CHtml::errorSummary($this);
                else
                    $result = "success";
            } catch (Exception $ex) {
                error_log("=====Exception occurred in saveModel====" . $ex->getMessage());
            }
        }error_log("result=========".$result); 
        return $result;
    }

    
   public function getAllUsers(){
        try{            
            $query = "SELECT * FROM KG_InvitationUsers";
                   
            $result = Yii::app()->db->createCommand($query)->queryAll();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function getStatusUser($id,$val){
        if($val==0){$status=1;}
        if($val==1){$status=0;}
        error_log("----------".$id.'---------'.$val.'----'.$status);
        $result = "failed";
        try{
            $InviteObj = InviteUser::model()->findByAttributes(array('Id'=>$id));
            $InviteObj->status = $status;
            if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }


    

    

    

     

    

}

?>
