<?php

class Vendor extends CActiveRecord {

    public $vendor_id;
    public $address_type;
    public $create_timestamp;
    public $update_timestamp;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_vendor';
    }

    public function getSavedetails($type) {
        try {
            $vendorDetails = new Vendor();
            //$vendorDetails->first_name = $model->FirstName;
            $vendorDetails->address_type = $type;
            $vendorDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $vendorDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($vendorDetails->save()) {
                $id = $vendorDetails->primaryKey;
                error_log("vendor ID=============".$id);
            } 
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $id;
    }
    //$query = "update   EmployeeBMI set IsSmokingSessasion=1,IsProhibition=1 , ProhibitionDate='".date('Y-m-d H:i:s')."'  where CycleId =" . $result['CycleId'] . " and EmployeeUserId=" . $result['EmployeeUserId'];
    //          YII::app()->db->createCommand($query)->execute();


    

}
?>
