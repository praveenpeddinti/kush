<?php

class StewardsCleaningService extends CActiveRecord {

    public $ServiceId;
    public $CustId;
    public $event_type;
    public $event_name;
    public $order_number;
    public $order_id;
    public $start_time;
    public $end_time;
    public $attend_people;
    public $status;
    public $appetizers;
    public $dinner;
    public $dessert;
    public $alcoholic;
    public $post_dinner;
    public $service_hours;
    public $no_of_stewards;
    public $S_differentaddress;
    public $S_address1;
    public $S_address2;
    public $S_alternate_phone;
    public $S_state;
    public $S_city;
    public $S_pincode;
    public $create_timestamp;
    public $update_timestamp;
  
 
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Stewards_cleaning_service';
    }

    //New Services
    public function addStewardsCleaningService($model,$cId) {
        try {
            $orderNo="KG000".$cId.gmdate("Y-m-d", time());
            $servicesDetails = new StewardsCleaningService();
            $servicesDetails->ServiceId = 3;
            $servicesDetails->CustId = $cId;
            $servicesDetails->event_type = $model->EventType;
            $servicesDetails->event_name = $model->EventName;
            //$servicesDetails->order_number = $orderNo;
            $servicesDetails->start_time = $model->StartTime;
            $servicesDetails->end_time = $model->EndTime;
            $servicesDetails->attend_people = $model->AttendPeople;
            $servicesDetails->appetizers = $model->Appetizers;
            $servicesDetails->dinner = $model->Dinner;
            $servicesDetails->dessert = $model->Dessert;
            $servicesDetails->alcoholic = $model->Beverage;
            $servicesDetails->post_dinner = $model->PostDinner;
            $servicesDetails->service_hours = $model->DurationHours;
            $servicesDetails->no_of_stewards = $model->totalStewards;
            $servicesDetails->S_differentaddress = $model->DifferentAddress;
            $servicesDetails->S_address1 = $model->Address1;
            $servicesDetails->S_address2 = $model->Address2;
            $servicesDetails->S_alternate_phone = $model->AlternatePhone;
            if($model->State=='')
            $servicesDetails->S_state=$model->state;
            else
            $servicesDetails->S_state = $model->State;
            if($model->City=='')
            $servicesDetails->S_city=$model->city;
            else
            $servicesDetails->S_city = $model->City;
            $servicesDetails->S_pincode = $model->PinCode;
            $servicesDetails->status = 0;
            $servicesDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($servicesDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    // Update Stewards
    public function updateStewardsCleaningService($model,$cId) {
        try {
            $servicesDetails = StewardsCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            $orderNo="KG000".$cId.gmdate("Y-m-d", time());
            $servicesDetails->ServiceId = 3;
            $servicesDetails->CustId = $cId;
            //$servicesDetails->event_type = $Event[0];
            //$servicesDetails->event_name = $Event[1];
            $servicesDetails->event_type = $model->EventType;
            $servicesDetails->event_name = $model->EventName;
            //$servicesDetails->order_number = $orderNo;
            $servicesDetails->start_time = $model->StartTime;
            $servicesDetails->end_time = $model->EndTime;
            $servicesDetails->attend_people = $model->AttendPeople;
            //$servicesDetails->status = $model->WindowGrills;
            $servicesDetails->appetizers = $model->Appetizers;
            $servicesDetails->dinner = $model->Dinner;
            $servicesDetails->dessert = $model->Dessert;
            $servicesDetails->alcoholic = $model->Beverage;
            $servicesDetails->post_dinner = $model->PostDinner;
            $servicesDetails->service_hours = $model->DurationHours;
            $servicesDetails->no_of_stewards = $model->totalStewards;
            $servicesDetails->S_differentaddress = $model->DifferentAddress;
            $servicesDetails->S_address1 = $model->Address1;
            $servicesDetails->S_address2 = $model->Address2;
            $servicesDetails->S_alternate_phone = $model->AlternatePhone;
            $servicesDetails->S_state = $model->State;
            $servicesDetails->S_city = $model->City;
            $servicesDetails->S_pincode = $model->PinCode;
            $servicesDetails->status = 0;
            //$servicesDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($servicesDetails->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    
    
    
    public function getServicesDetails($Id) {
        try {
            $query = "SELECT * FROM KG_Stewards_cleaning_service WHERE CustId = $Id AND status = 0 ORDER BY Id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

    public function checkingStewardService($cId) {
        try {
            $service = StewardsCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            if (empty($service)) {
                $result = "No Service";
                return $result;
            } else {
                $result = "Yes Service";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getcustomerServicesStewards($Id) {
        try {
            
            $customer = StewardsCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $Id, ':status' => '0'));
            
            if (empty($customer)) {
                $result = "No Service";
                return $result;
            } else {
                $result = "Yes Service";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getcustomerServicesStewardsStatus($cId) {
        try { 
            $servicesDetails = StewardsCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            $servicesDetails->status = '0';
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($servicesDetails->update()) {
                    $result = "success";
                } else {
                    $result = "failed";
                }
                         
            
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    public function storeOrdernumberofStewards($cId,$orderId,$orderNo) {
        try { 
            $servicesDetails = StewardsCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            $servicesDetails->order_id = $orderId;
            $servicesDetails->order_number = $orderNo;
            $servicesDetails->status = 1;
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($servicesDetails->update()) {
                    $result = "success";
                } else {
                    $result = "failed";
                }
                         
            
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    /*
     * @praveen Delete House cleaning when the service is not selected (i.e once service is selected but not place order again service is not selected).
     */
    public function deleteStewardService($cId) {
        try {
            $service = StewardsCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            if (empty($service)) {
                $result = "No Delete";
                return $result;
            } else {
                $query = "DELETE FROM KG_Stewards_cleaning_service WHERE CustId = $cId and status=0";
                YII::app()->db->createCommand($query)->execute();
                $result = "Yes Delete";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    }
    public function getStewardsDetailsByOrderNumber($orderNumber){
        try{
            $query="select * from KG_Stewards_cleaning_service where order_number=".$orderNumber;
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("######Error occurred in stewards details by order number#####".$ex->getMessage());
        }
        return $result;
    }

}
?>
