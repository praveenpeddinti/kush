<?php

class UserRoles extends CActiveRecord{
    
    public $UserId;
    public $UserTypeId;   
  
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'UserRoles';
    }
    
    public function getUserRoleById($userId){
        try{
        $query = "select ut.Description,ur.UserTypeId from UserRoles ur,UserTypes ut where ur.UserId =$userId and ur.UserTypeId=ut.UserTypeId order by UserTypeId desc ";
        error_log("query===$query");
        $result = YII::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("=========Exception Occurred==========".$ex->getMessage());
        }
        return $result;
    }
       public function getUserRoleByIdandRollId($userId,$rollId){
        try{
           
        $query = "select * from UserRoles where UserId = ".$userId."  and UserTypeId=".$rollId;
        error_log("query===$query");
        $result = YII::app()->db->createCommand($query)->queryRow();
        error_log($result['Id']."query===$query");
        if(isset($result['Id'])){
             
            return true;
        }
        else{
             error_log("=elseeeeeeeeeeeeeeeeeeeeee=====#########################################===ELSE=========");
            return false;
        }
        }catch(Exception $ex){
            error_log("=========Exception Occurred==========".$ex->getMessage());
        }
        return $result;
    }
    
    public function saveUserId($result,$UserTypeId){
        try{
            $return = false;
            $userRoles = new UserRoles();
            $userRoles->UserId = $result;
            $userRoles->UserTypeId = $UserTypeId;
//            $userRoles = UserRoles::model()->findByAttributes(array('UserId'=>$result));
            
                if($userRoles->save()){
                    $return = true;
                }
            
        }catch(Exception $ex){
            error_log("====Exception Occurred==saveUserId=====".$ex->getMessage());
        }
        return $return;
    }
    
    
    

}

?>
