<?php

class InviteUser extends CActiveRecord {

    public $first_name;
    public $last_name;
    public $email_address;
    public $city;
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
                $user->city = stripcslashes($model->City);
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
    
   public function getTotalUsers($uname,$phone,$status){
        try{
            
            if(($uname=='')&&($phone=='')&&($status=='20'))
                $query = "select count(*) as count from KG_InvitationUsers";
            else if(($uname=='')&&($phone=='')&&($status!='20'))
                $query="select count(*) as count from KG_InvitationUsers where invite=".$status;
            else if(($uname!='')&&($phone=='')&&($status=='20'))
                $query="select count(*) as count from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%'";
            else if(($uname=='')&&($phone!='')&&($status=='20'))
                $query="select count(*) as count from KG_InvitationUsers where phone like '%".$phone."%'";
            else if(($uname=='')&&($phone!='')&&($status!='20'))
                $query="select count(*) as count from KG_InvitationUsers where invite=".$status." and phone like '%".$phone."%'";
            else if(($uname!='')&&($phone=='')&&($status!='20'))
                $query="select count(*) as count from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' and invite=".$status;
            else if(($uname!='')&&($phone!='')&&($status=='20'))
                $query="select count(*) as count from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' and phone like '%".$phone."%'";
            else if(($uname!='')&&($phone!='')&&($status!='20'))
                $query="select count(*) as count from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' and phone like '%".$phone."%' and invite=".$status;
           
//            $query = "SELECT count(*) as count FROM KG_InvitationUsers";
                   
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    } 
   public function getAllUsers($start,$end,$uname,$phone,$status){
        try{     
            if(($uname=='')&&($phone=='')&&($status=='20'))
                $query = "select * from KG_InvitationUsers ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($phone=='')&&($status!='20'))
                $query="select * from KG_InvitationUsers where invite=".$status. " ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($phone=='')&&($status=='20'))
                $query="select * from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($phone!='')&&($status=='20'))
                $query="select * from KG_InvitationUsers where phone like '%".$phone."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($phone!='')&&($status!='20'))
                $query="select * from KG_InvitationUsers where invite=".$status." and phone like '%".$phone."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($phone=='')&&($status!='20'))
                $query="select * from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' and invite=".$status." ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($phone!='')&&($status=='20'))
                $query="select * from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' and phone like '%".$phone."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($phone!='')&&($status!='20'))
                $query="select * from KG_InvitationUsers where CONCAT_WS(' ',first_name,last_name) like '%".$uname."%' and phone like '%".$phone."%' and invite=".$status." ORDER BY id DESC limit ".$start. ",".$end;
           
//            $query = "SELECT * FROM KG_InvitationUsers where status =1 ORDER BY id DESC limit ".$start. ",".$end;
                
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
    public function getRegisteredUser($uname,$city,$location,$status){
        try{
            if(($uname=='')&&($city=='')&&($status=='20')&&($location==''))
                $query = "select count(*) as count from KG_Customer";
            else if(($uname=='')&&($location=='')&&($status!='20')&&($location==''))
                $query="select count(*) as count from KG_Customer where status=".$status;
            else if(($uname!='')&&($city=='')&&($status=='20')&&($location==''))
                $query="select count(*) as count from KG_Customer where CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%'";
            else if(($uname=='')&&($city!='')&&($status=='20')&&($location==''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and a.address_city like '%".$city."%'";
            else if(($uname=='')&&($city!='')&&($status!='20')&&($location==''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and c.status=".$status." and a.address_city like '%".$city."%'";
            else if(($uname!='')&&($city=='')&&($status!='20')&&($location==''))
                $query="select count(*) as count from KG_Customer where CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and c.status=".$status;
            else if(($uname!='')&&($city!='')&&($status=='20')&&($location==''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and a.address_city like '%".$city."%'";
            else if(($uname!='')&&($city!='')&&($status!='20')&&($location==''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and a.address_city like '%".$city."%' and c.status=".$status;
           else if(($uname=='')&&($city=='')&&($status=='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and a.address_notes like '%".$location."%'";
           else if(($uname!='')&&($city=='')&&($status=='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and a.address_notes like '%".$location."%'";
           else if(($uname=='')&&($city!='')&&($status=='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and a.address_city like '%".$city."%' and a.address_notes like '%".$location."%'";
           else if(($uname=='')&&($city=='')&&($status!='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and c.status=".$status." and a.address_notes like '%".$location."%'";
           else if(($uname!='')&&($city=='')&&($status!='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and c.status=".$status." and a.address_notes like '%".$location."%'";
           else if(($uname=='')&&($city!='')&&($status!='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and a.address_city like '%".$city."%' and c.status=".$status." and a.address_notes like '%".$location."%'";
           else if(($uname!='')&&($city!='')&&($status=='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and a.address_city like '%".$city."%' and a.address_notes like '%".$location."%'";
           else if(($uname!='')&&($city!='')&&($status!='20')&&($location!=''))
                $query="select count(*) as count from KG_Customer c,KG_customer_address a where c.customer_id=a.customer_id and CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and a.address_city like '%".$city."%' and c.status=".$status." and a.address_notes like '%".$location."%'";
               
           $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Registered Contacts##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllRegisteredUsers($start,$end,$uname,$city,$location,$status){
        try{  
            if(($uname=='')&&($location=='')&&($status=='20')&&($city==''))
                $query = "select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City, c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city=='')&&($status!='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and c.status=".$status." ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city=='')&&($status=='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City, c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city!='')&&($status=='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and ca.address_city like '%".$city."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city!='')&&($status!='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and c.status=".$status." and ca.address_city like '%".$city."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city=='')&&($status!='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and c.status=".$status." ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city!='')&&($status=='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and ca.address_city like '%".$city."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city!='')&&($status!='20')&&($location==''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and ca.address_city like '%".$city."%' and c.status=".$status." ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city=='')&&($status=='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city=='')&&($status=='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city!='')&&($status=='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and ca.address_city like '%".$city."%' and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city=='')&&($status!='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and c.status=".$status." and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city=='')&&($status!='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and c.status=".$status." and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($city!='')&&($status!='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and ca.address_city like '%".$city."%' and c.status=".$status." and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city!='')&&($status=='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and ca.address_city like '%".$city."%' and ca.address_notes like '%".$location."%' ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($city!='')&&($status!='20')&&($location!=''))
                $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_notes as Location , ca.address_city as City , c.status  from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id and CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) like '%".$uname."%' and ca.address_city like '%".$city."%' and ca.address_notes like '%".$location."%' and c.status=".$status." ORDER BY c.create_timestamp DESC limit ".$start. ",".$end;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
     public function ChangeStatusUser($id, $val) {
       $result="failed";
       try{
           if($val==1)
                $query="update KG_Customer set status=0 where customer_id=".$id;
           else if ($val==0)
                $query="update KG_Customer set status=1 where customer_id=".$id;
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing status #########".$ex->getMessage());
       }
       return $result;
    }
    public function getFullUserDetails($id){
        try{
        $query="select c.customer_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address , c.phone , c.create_timestamp , ca.address_line1,ca.address_line2,ca.address_city, ca.address_notes, c.status,c.profilePicture from KG_Customer c join KG_customer_address ca on ca.customer_id=c.customer_id where c.customer_id=".$id ;
        $result = Yii::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("################Exception Occurred  get Full Details Contacts##############".$ex->getMessage());
        }
        return $result;
    }

    public function getRegisteredVendorUser($uname,$location,$status){
        try{
            if(($uname=='')&&($location=='')&&($status=='20'))
                $query = "select count(*) as count from KG_vendor_individual";
            else if(($uname=='')&&($location=='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_individual where status=".$status;
            else if(($uname!='')&&($location=='')&&($status=='20'))
                $query="select count(*) as count from KG_vendor_individual where CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%'";
            else if(($uname=='')&&($location!='')&&($status=='20'))
                $query="select count(*) as count from KG_vendor_individual i,KG_vendor_address ad where ad.vendor_individual_id=i.vendor_id and ad.address_city like '%".$location."%'";
            else if(($uname=='')&&($location!='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_individual i,KG_vendor_address ad where ad.vendor_individual_id=i.vendor_id and i.status=".$status." and ad.address_city like '%".$location."%'";
            else if(($uname!='')&&($location=='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_individual where CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and status=".$status;
            else if(($uname!='')&&($location!='')&&($status=='20'))
                $query="select count(*) as count from KG_vendor_individual i,KG_vendor_address ad where ad.vendor_individual_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%'";
            else if(($uname!='')&&($location!='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_individual i,KG_vendor_address ad where ad.vendor_individual_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%' and i.status=".$status;
            
//            $query = "select count(*) as count from KG_vendor_individual";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Registered Contacts##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllRegisteredVendorUsers($start,$end,$uname,$location,$status){
        try{ 
            if(($uname=='')&&($location=='')&&($status=='20'))
                $query = "select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($location=='')&&($status!='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and i.status=".$status." ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location=='')&&($status=='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($location!='')&&($status=='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and ad.address_city like '%".$location."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($location!='')&&($status!='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and i.status=".$status." and ad.address_city like '%".$location."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location=='')&&($status!='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and i.status=".$status." ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location!='')&&($status=='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location!='')&&($status!='20'))
                $query="select i.vendor_individual_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status,i.is_approved, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%' and i.status=".$status." ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
//            $query = "select  CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn, ad.address_city as Location from  KG_vendor_individual i join KG_vendor_address ad on ad.vendor_individual_id=i.vendor_id ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function ChangeVendorStatus($id, $val) {
       $result="failed";
       try{
           if($val==1){
                $query="update KG_vendor_individual set status=0 where vendor_individual_id=".$id;
           }
           else if ($val==0){
                $query="update KG_vendor_individual set status=1 where vendor_individual_id=".$id;
           }
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing status #########".$ex->getMessage());
       }
       return $result;
    }
    public function getRegisteredAgencyVendorUser($uname,$location,$status){
        try{
            if(($uname=='')&&($location=='')&&($status=='20'))
                $query = "select count(*) as count from KG_vendor_business";
            else if(($uname=='')&&($location=='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_business where status=".$status;
            else if(($uname!='')&&($location=='')&&($status=='20'))
                $query="select count(*) as count from KG_vendor_business where CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%'";
            else if(($uname=='')&&($location!='')&&($status=='20'))
                $query="select count(*) as count from KG_vendor_business i,KG_vendor_address ad where ad.vendor_business_id=i.vendor_id and ad.address_city like '%".$location."%'";
            else if(($uname=='')&&($location!='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_business i,KG_vendor_address ad where ad.vendor_business_id=i.vendor_id and i.status=".$status." and ad.address_city like '%".$location."%'";
            else if(($uname!='')&&($location=='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_business where CONCAT_WS(' ',first_name,middle_name,last_name) like '%".$uname."%' and status=".$status;
            else if(($uname!='')&&($location!='')&&($status=='20'))
                $query="select count(*) as count from KG_vendor_business i,KG_vendor_address ad where ad.vendor_business_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%'";
            else if(($uname!='')&&($location!='')&&($status!='20'))
                $query="select count(*) as count from KG_vendor_business i,KG_vendor_address ad where ad.vendor_business_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%' and i.status=".$status;
//            $query = "select count(*) as count from KG_vendor_business";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Registered Contacts##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllRegisteredAgencyVendorUsers($start,$end,$uname,$location,$status){
        try{ 
            if(($uname=='')&&($location=='')&&($status=='20'))
                $query = "select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($location=='')&&($status!='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and i.status=".$status." ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location=='')&&($status=='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($location!='')&&($status=='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and ad.address_city like '%".$location."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname=='')&&($location!='')&&($status!='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and i.status=".$status." and ad.address_city like '%".$location."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location=='')&&($status!='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and i.status=".$status." ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location!='')&&($status=='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%' ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
            else if(($uname!='')&&($location!='')&&($status!='20'))
                $query="select i.vendor_id as vid, CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) as UserName, i.email_address, i.phone,i.create_timestamp as RegisteredOn,i.status, ad.address_city as Location from  KG_vendor_business i join KG_vendor_address ad on ad.vendor_business_id=i.vendor_id and CONCAT_WS(' ',i.first_name,i.middle_name,i.last_name) like '%".$uname."%' and ad.address_city like '%".$location."%' and i.status=".$status." ORDER BY i.create_timestamp DESC limit ".$start. ",".$end;
//            $query = "select CONCAT_WS(' ',b.first_name,b.middle_name,b.last_name) as UserName, b.email_address, b.phone,b.create_timestamp as RegisteredOn, ad.address_city as Location from KG_vendor_business b join KG_vendor_address ad on ad.vendor_business_id=b.vendor_id ORDER BY b.create_timestamp DESC limit ".$start. ",".$end;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function ChangeAgencyStatus($id, $val) {
       $result="failed";
       try{
           if($val==1)
                $query="update KG_vendor_business set status=0 where vendor_id=".$id;
           else if ($val==0)
                $query="update KG_vendor_business set status=1 where vendor_id=".$id;
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing status #########".$ex->getMessage());
       }
       return $result;
    }
    
    
    
    public function checkNewUserExistInInviteTable($emailId) {
        try {
            $result='';
            $newDetails = new InviteUser();
            $user = InviteUser::model()->findByAttributes(array(), 'email_address=:email_address', array(':email_address' => $emailId));
            
            if (empty($user)) {
               
                $result = "No user";
                
            } else {
                $result = "yes user";
                
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    } 
    public function saveInvitationFriendUser($model,$type) {
        $result = "false";
        
        //$user = InviteUser::model()->findByAttributes(array('email_address' => $model->Email));
        if (!isset($user)) {
            try {
                $user = new InviteUser();
                              
                $user->first_name = stripcslashes($model->FirstName);
                $user->last_name = stripcslashes($model->LastName);
                $user->email_address = stripcslashes($model->Email);
                $user->city = stripcslashes($model->City);
                $user->phone = stripcslashes($model->Phone);
                $user->type = stripcslashes($type);
                $user->invite = 1;
                $user->location = $model->Location;
                $user->create_timestamp = gmdate("Y-m-d H:i:s", time());
                $user->referrer=$model->Referrer;
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
    public function getFullVendorDetails($id){
        try{
        $query="select c.vendor_id as cid, CONCAT_WS(' ',first_name,middle_name,last_name) as UserName , c.email_address ,c.password_salt, c.phone , c.create_timestamp , ca.address_line1,ca.address_line2,ca.address_city , c.status,c.profilePicture,cd.proof_image_file_location,cd.address_image_file_location,cd.clearance_image_file_location  from KG_vendor_individual c join KG_vendor_address ca on ca.vendor_address_id=c.vendor_id join KG_vendor_individual_documents cd on cd.vendor_individual_id=c.vendor_id where c.vendor_individual_id=".$id ;
        $result = Yii::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("################Exception Occurred  get Full Details Contacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function GetAllUserExcelData(){
        try{
            $query="select customer_id as UserId,CONCAT_WS(' ',first_name,middle_name,last_name) as UserName,email_address,phone,create_timestamp as RegisteredOn from KG_Customer";
             
            $result = Yii::app()->db->createCommand($query)->queryAll();
        } catch (Exception $ex) {
            error_log("#########Exception raised in get Al user data for excel########".$ex->getMessage());
        }
        return $result;
    }
    public function getUserExcelDataCount(){
        try{
            $query="select count(*) as count from KG_Customer";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("#######Exception raised in Get user count for excel data#######".$ex->getMessage());
        }
        return $result['count'];
    }
    /*
     * @praveen Report for paid customer details with invoice
     */
    public function GetPaidUsersExcelDataCount(){
    try{
            $query="select count(*) as count from KG_Invoice_details where Status=1";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("#######Exception raised in Get user count for excel data#######".$ex->getMessage());
        }
        return $result['count'];
    }
    public function GetPaidUserDetailsWithInvoiceExcelData(){
        try{
            $query="SELECT c.customer_id as UserId,i.OrderId,o.service_date,CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) as UserName,c.email_address,c.phone,h.total_livingRooms,h.total_bedRooms,h.total_kitchens,h.total_bathRooms,h.other_rooms,(sum(h.window_grills)+sum(h.cupboard_cleaning)+sum(h.fridge_interior)+sum(h.microwave_oven_interior)) as Additionalservices,o.total_service_hours,o.total_service_people,i.Amount from KG_Order_details o, KG_House_cleaning_service h,KG_Invoice_details i,KG_Customer c where o.order_number=h.order_number and o.order_number=i.OrderId and c.customer_id=h.CustId and h.order_number=i.OrderId and i.Status=1 group by o.order_number order by i.OrderId desc";
            
            $result = Yii::app()->db->createCommand($query)->queryAll();
        } catch (Exception $ex) {
            error_log("#########Exception raised in get Al user data for excel########".$ex->getMessage());
        }
        return $result;
    }
}

?>