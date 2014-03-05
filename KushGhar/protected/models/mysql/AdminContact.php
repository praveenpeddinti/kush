<?php

class AdminContact extends CActiveRecord {

    public $Id;
    public $FirstName;
    public $LastName;
    public $Email;                
    public $CompanyName;
    public $Description;
    public $PhoneNumber;
    public $PhoneExt;
    public $IsEmployer;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'AdminContacts';
    }
   
    public function saveAdminContact($model){
        $result = "failed";
        try{
        $adminContact = new AdminContact();
        if(isset($model->Id) && !empty($model->Id)){
            // update condition ...
        }else{
            // save condition ...
            $adminContact->FirstName = $model->FirstName;
            $adminContact->LastName = $model->LastName;
            $adminContact->CompanyName = $model->CompanyName;
            if(isset($adminContact->PhoneNumber)){
                $adminContact->PhoneNumber = $model->PhoneNumber;
                $adminContact->PhoneExt = $model->PhoneExt;
            }
            $adminContact->Description = $model->Description;
            $adminContact->Email = $model->Email;
            if(isset($model->IsEmployer))
                    $type = $model->IsEmployer;
            if(isset($model->Type))
                    $type = $model->Type;
                $adminContact->IsEmployer = $type;
            
            if($adminContact->save()){
                $result = "success";
            }
            
        }
        }catch(Exception $ex){
            error_log("##########Exception Occurred saveAdminContact#############".$ex->getMessage());
        }
        return $result;
    }
    
    public function getAllContacts($filterValue,$searchText, $startLimit, $pageLength){
        try{            
            $query = "SELECT *,date_format(CreatedOn,'%m/%d/%Y') CreatedOn FROM AdminContacts WHERE";
            if (trim($filterValue) == "active") {
                $query = $query."  Active = 1";
            }else if (trim($filterValue) == "inactive") {
                $query = $query."  Active = 0";
            }else if (trim($filterValue) == "employers") {
                $query = $query."  IsEmployer = 2";
            }else if (trim($filterValue) == "partners") {
                $query = $query."  IsEmployer = 3";
            }else if (trim($filterValue) == "employees") {
                $query = $query."  IsEmployer = 1";
            }else if (trim($filterValue) == "all") {
                $query = $query."  Active = 0 OR Active = 1";
            }            
            if (!empty($searchText) && $searchText != "undefined" && $searchText != "null") {
            $query = $query . " AND (FirstName like '%$searchText%' or LastName like '%$searchText%' or CompanyName LIKE '%$searchText%' ) ";
        }
            if ($startLimit != "null" && $startLimit != "" && $startLimit != "undefined" && $pageLength != "null" && $pageLength != "undefined")
            $query = $query . " limit $startLimit,$pageLength";
            $result = Yii::app()->db->createCommand($query)->queryAll();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function getAllContactsCount($filterValue,$searchText){
        try{            
            $query = "SELECT count(Id) count FROM AdminContacts WHERE";
            if (trim($filterValue) == "active") {
                $query = $query."  Active = 1";
            }else if (trim($filterValue) == "inactive") {
                $query = $query."  Active = 0";
            }else if (trim($filterValue) == "employers") {
                $query = $query."  IsEmployer = 2";
            }else if (trim($filterValue) == "partners") {
                $query = $query."  IsEmployer = 3";
            }else if (trim($filterValue) == "employees") {
                $query = $query."  IsEmployer = 1";
            }else if (trim($filterValue) == "all") {
                $query = $query."  Active = 0 OR Active = 1";
            }            
            if (!empty($searchText) && $searchText != "undefined" && $searchText != "null") {
                $query = $query . " AND (FirstName like '%$searchText%' or LastName like '%$searchText%' or CompanyName LIKE '%$searchText%' ) ";
            }            
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContactsCount##############".$ex->getMessage());
        }
        return $result['count'];
    }
    
    public function changeContactStatus($id,$val){
        $result = "failed";
        try{
            $adminContactObj = AdminContact::model()->findByAttributes(array('Id'=>$id));
            $adminContactObj->Active = $val;
            if($adminContactObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    
    public function deleteContactById($contactId){
        $result = "failed";
        try{
            $adminContactObj = AdminContact::model()->findByAttributes(array('Id'=>$id));
            $query = "DELETE FROM AdminContacts WHERE Id = $contactId";
            if(YII::app()->db->createCommand($query)->execute())
              $result = "success";      
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    
    
    public function viewAdminContactDetailsById($contactId){
        $adminContactObj = AdminContact::model()->findByAttributes(array("Id"=>$contactId));
        $timestamp = strtotime($adminContactObj->CreatedOn);
        $adminContactObj->CreatedOn = date("m/d/Y", $timestamp);
        return $adminContactObj;
    }
    public function checkContactEmailExist($model){
        $obj = AdminContact::model()->findByAttributes(array("Email"=>$model->Email));
        return $obj;
    }
}

?>

