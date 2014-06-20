<?php

class HouseCleaningService extends CActiveRecord {

    public $CustId;
    public $order_number;
    public $order_id;
    public $squarefeets;
    public $week_days;
    public $houseservice_start_time;
    public $total_livingRooms;
    public $total_bedRooms;
    public $total_kitchens;
    public $total_bathRooms;
    public $status;
    public $window_grills;
    public $fridge_interior;
    public $microwave_oven_interior;
    public $pooja_room_cleaning;
    public $service_no_of_times;
    public $create_timestamp;
    public $update_timestamp;
  
 
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_House_cleaning_service';
    }

    
    //New Services
    public function addHouseCleaningService($model,$cId,$haveService) {
        try { 
            
            $orderNo="KG000".$cId.gmdate("Y-m-d", time());
            $servicesDetails = new HouseCleaningService();
            $servicesDetails->CustId = $cId;
            //$servicesDetails->order_number = $orderNo;
            $servicesDetails->squarefeets = $model->SquareFeets;
            $servicesDetails->week_days = $model->WeekDays;
            $servicesDetails->houseservice_start_time = $model->ServiceStartTime;
            $servicesDetails->total_livingRooms = $model->LivingRooms;
            $servicesDetails->total_bedRooms = $model->BedRooms;
            $servicesDetails->total_kitchens = $model->Kitchens;
            $servicesDetails->total_bathRooms = $model->BathRooms;
            $servicesDetails->window_grills = $model->WindowGrills;
            $servicesDetails->fridge_interior = $model->FridgeInterior;
            $servicesDetails->microwave_oven_interior = $model->MicroWaveOven;
            $servicesDetails->pooja_room_cleaning = $model->PoojaRoom;
            $servicesDetails->service_no_of_times = $model->NumberOfTimesServices;
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
    
    public function updateHouseCleaningService($model,$cId,$haveService) {
        try { 
            $servicesDetails = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            
        
            $orderNo="KG000".$cId.gmdate("Y-m-d", time());
            $servicesDetails->CustId = $cId;
            //$servicesDetails->order_number = $orderNo;
            $servicesDetails->squarefeets = $model->SquareFeets;
            $servicesDetails->week_days = $model->WeekDays;
            $servicesDetails->houseservice_start_time = $model->ServiceStartTime;
            $servicesDetails->total_livingRooms = $model->LivingRooms;
            $servicesDetails->total_bedRooms = $model->BedRooms;
            $servicesDetails->total_kitchens = $model->Kitchens;
            $servicesDetails->total_bathRooms = $model->BathRooms;
            $servicesDetails->window_grills = $model->WindowGrills;
            $servicesDetails->fridge_interior = $model->FridgeInterior;
            $servicesDetails->microwave_oven_interior = $model->MicroWaveOven;
            $servicesDetails->pooja_room_cleaning = $model->PoojaRoom;
            $servicesDetails->service_no_of_times = $model->NumberOfTimesServices;
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
            $query = "SELECT * FROM KG_House_cleaning_service WHERE CustId = $Id AND status = 0 ORDER BY Id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

    public function checkingHouseService($cId) {
        try {
            $service = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
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
    
    public function getcustomerServicesHouse($Id) {
        try {
            
            $customer = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $Id, ':status' => '0'));
            
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
    
    
    public function getcustomerServicesHouseStatus($cId) {
        try { 
            $servicesDetails = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            $servicesDetails->status = 0;
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
    
    
    public function storeOrdernumberofHouse($cId,$orderId,$orderNo) {
        try { 
            $servicesDetails = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
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
    
    
    public function getOrderDetails($Id) {
        try {
            $query = "SELECT * FROM KG_Order_details WHERE CustId = $Id and ServiceId!='' ORDER BY Id ASC";
            $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getOrderDetails Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getOrderDetailsinAdmin($start,$end,$type) {
        try {//$query = "SELECT * FROM KG_InvitationUsers where status =1 limit ".$start. ",".$end;
            if($type=='0'){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId!='' limit ".$start. ",".$end;   
            }else if($type=='1'){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId=$type limit ".$start. ",".$end;     
            }else{
               $query = "SELECT * FROM KG_Order_details WHERE ServiceId=$type limit ".$start. ",".$end;  
            }
           $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getOrderDetails Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

}
?>
