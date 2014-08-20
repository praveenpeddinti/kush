<?php

class HouseCleaningService extends CActiveRecord {

    public $CustId;
    public $order_number;
    public $order_id;
    public $house_type;
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
    public $H_differentaddress;
    public $H_address1;
    public $H_address2;
    public $H_alternate_phone;
    public $H_state;
    public $H_city;
    public $H_pincode;
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
            $servicesDetails = new HouseCleaningService();
            $servicesDetails->CustId = $cId;
            $servicesDetails->house_type = $model->HouseType;
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
            $servicesDetails->H_differentaddress = $model->DifferentAddress;
            $servicesDetails->H_address1 = $model->Address1;
            $servicesDetails->H_address2 = $model->Address2;
            $servicesDetails->H_alternate_phone = $model->AlternatePhone;
            if($model->State=='')
            $servicesDetails->H_state=$model->state;
            else
            $servicesDetails->H_state = $model->State;
            if($model->City=='')
            $servicesDetails->H_city=$model->city;
            else
            $servicesDetails->H_city = $model->City;
            $servicesDetails->H_pincode = $model->PinCode;
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
            
        
            $servicesDetails->CustId = $cId;
            $servicesDetails->house_type = $model->HouseType;
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
            $servicesDetails->H_differentaddress = $model->DifferentAddress;
            $servicesDetails->H_address1 = $model->Address1;
            $servicesDetails->H_address2 = $model->Address2;
            $servicesDetails->H_alternate_phone = $model->AlternatePhone;
            $servicesDetails->H_state = $model->State;
            $servicesDetails->H_city = $model->City;
            $servicesDetails->H_pincode = $model->PinCode;
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
    
    
    
    /*
     * @praveen Delete House cleaning when the service is not selected (i.e once service is selected but not place order again service is not selected).
     */
    public function deleteHouseService($cId) {
        try {
            $service = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            if (empty($service)) {
                $result = "No Delete";
                return $result;
            } else {
                $query = "DELETE FROM KG_House_cleaning_service WHERE CustId = $cId and status=0";
                YII::app()->db->createCommand($query)->execute();
                $result = "Yes Delete";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
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

    public function getOrderDetailsForCustomer($start,$end,$type,$orderNo,$cId) {
        try {//$query = "SELECT * FROM KG_InvitationUsers where status =1 limit ".$start. ",".$end;
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId!='' and CustId = $cId limit ".$start. ",".$end;
            

           $result = YII::app()->db->createCommand($query)->queryAll();

        } catch (Exception $ex) {
            error_log("getOrderDetails Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

    public function getOrderDetailsinAdmin($start,$end,$type,$orderNo,$status) {
        try {//$query = "SELECT * FROM KG_InvitationUsers where status =1 limit ".$start. ",".$end;
            if(($type=='0') && ($orderNo=='0') && ($status=='20')){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId!='' limit ".$start. ",".$end;   
            }else if(($type!='0') && ($orderNo=='0') && ($status=='20')){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId=".$type." limit ".$start. ",".$end;     
            }else if(($type=='0') && ($orderNo!='0') && ($status=='20')){
             $query = "SELECT * FROM KG_Order_details WHERE order_number=".$orderNo." limit ".$start. ",".$end;     
            }else if(($type=='0') && ($orderNo=='0') && ($status!='20')){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId!='' and status=".$status." limit ".$start. ",".$end;     
            }else if(($type!='0') && ($orderNo!='0') && ($status=='20')){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId=".$type." and order_number=".$orderNo." limit ".$start. ",".$end;     
            }else if(($type!='0') && ($orderNo=='0') && ($status!=='20')){
             $query = "SELECT * FROM KG_Order_details WHERE ServiceId=".$type." and status=".$status." limit ".$start. ",".$end;     
            }else if(($type=='0') && ($orderNo!='0') && ($status!=='20')){
             $query = "SELECT * FROM KG_Order_details WHERE order_number=".$orderNo." and status=".$status." limit ".$start. ",".$end;     
            }else{
               $query = "SELECT * FROM KG_Order_details WHERE ServiceId=$type and order_number=".$orderNo." and status=".$status." limit ".$start. ",".$end;  
            }
            
            
           $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getOrderDetails Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

}
?>
