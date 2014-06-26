<?php

class CarWashService extends CActiveRecord {

    public $ServiceId;
    public $CustId;
    public $total_cars;
    public $make_of_car;
    public $order_number;
    public $order_id;
    public $different_location;
    public $week_days;
    public $carservice_start_time;
    public $interior_cleaning;
    public $exterior_color;
    public $status;
    //public $wax_car;
    public $shampoo_seats;
    public $different_number;
    public $address_line1;
    public $address_line2;
    public $alternate_phone;
    public $address_city;
    public $address_state;
    public $address_pin_code;
    public $create_timestamp;
    public $update_timestamp;
  
 
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Car_cleaning_service';
    }

    
    //New Services
    public function addCarWashService($model,$cId,$DL) {
        try {
            $servicesDetails = new CarWashService();
            $orderNo="KG000".$cId.gmdate("Y-m-d", time());
            
            if($model->TotalCars>1){
            $make_of_car = explode(',', $model->MakeOfCar);
            $exterior_color = explode(',', $model->ExteriorColor);
            $interior_cleaning = explode(',', $model->InteriorCleaning);
            $shampoo_seats = explode(',', $model->ShampooSeats);
            //$shampoo_mats = explode(',', $model->WaxCar);
            $different_address = explode(',', $model->DifferentAddress);
            
            $address1 = explode(',', $model->Address1);
            $address2 = explode(',', $model->Address2);
            $alternate_phone = explode(',', $model->AlternatePhone);
            $state = explode(',', $model->State);
            $city = explode(',', $model->City);
            $pin_code = explode(',', $model->PinCode);
            $create_timestamp = gmdate("Y-m-d H:i:s", time());
            $update_timestamp = gmdate("Y-m-d H:i:s", time());
            
            //if(empty($address1)){error_log("yes empty address");}else{error_log("no empty address1");}
            for($i=0;$i<$model->TotalCars;$i++){
                /*if($different_address[$i]=='0'){error_log("enter save==2===");
                    $address1[$i]='';
                    $address2[$i]='';
                    $alternate_phone[$i]='';
                    $state[$i]='';
                    $city[$i]='';
                    $pin_code[$i]='';
                }else{
                    $address1[$i];
                    $address2[$i];
                    $alternate_phone[$i];
                    $state[$i];
                    $city[$i];
                    $pin_code[$i];
                }*/
                
                $query = "insert into  KG_Car_cleaning_service(ServiceId,CustId,total_cars,different_location,week_days,carservice_start_time,make_of_car,order_number,exterior_color,interior_cleaning,shampoo_seats,address_line1,address_line2,alternate_phone,address_state,address_city,address_pin_code,status,create_timestamp,update_timestamp) values(2,$cId,$model->TotalCars,$DL,'$model->WeekDays','$model->ServiceStartTime','$make_of_car[$i]','$orderNo','$exterior_color[$i]',$interior_cleaning[$i],$shampoo_seats[$i],'$address1[$i]','$address2[$i]','$alternate_phone[$i]','$state[$i]','$city[$i]','$pin_code[$i]','0','$create_timestamp','$update_timestamp')";
            
            $result1 = YII::app()->db->createCommand($query)->execute();
           
            
            }
           
            }else{
            $orderNo="KG000".$cId.gmdate("Y-m-d", time());
            $servicesDetails->CustId = $cId;
            $servicesDetails->ServiceId = 2;
            $servicesDetails->total_cars = $model->TotalCars;
            $servicesDetails->make_of_car = rtrim($model->MakeOfCar,",");
            //$servicesDetails->order_number = $orderNo;
            $servicesDetails->different_location = $DL;
            $servicesDetails->week_days = $model->WeekDays;
            $servicesDetails->carservice_start_time = $model->ServiceStartTime;
            $servicesDetails->interior_cleaning = $model->InteriorCleaning;
            $servicesDetails->exterior_color = rtrim($model->ExteriorColor,",");
            //$servicesDetails->wax_car = $model->WaxCar;
            $servicesDetails->shampoo_seats = $model->ShampooSeats;
            $servicesDetails->different_number = $model->DifferentAddress;
            $servicesDetails->address_line1 = rtrim($model->Address1,",");
            $servicesDetails->address_line2 = rtrim($model->Address2,",");
            $servicesDetails->alternate_phone = rtrim($model->AlternatePhone,",");
            $servicesDetails->address_city = rtrim($model->City,",");
            $servicesDetails->address_state = rtrim($model->State,",");
            $servicesDetails->address_pin_code = rtrim($model->PinCode,",");
            $servicesDetails->status = 0;
            $servicesDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->save();
            
            }
            $result = "success";
            
            
            //$cookie_domain = explode(',', $model->MakeOfCar);
            //error_log("count======".count($cookie_domain));
            
            /*$servicesDetails->make_of_car = $model->MakeOfCar;
            $servicesDetails->different_location = $model->DifferentLocation;
            $servicesDetails->interior_cleaning = $model->InteriorCleaning;
            $servicesDetails->exterior_color = $model->ExteriorColor;
            $servicesDetails->wax_car = $model->WaxCar;
            $servicesDetails->shampoo_seats = $model->ShampooSeats;
            $servicesDetails->different_number = $model->DifferentAddress;
            $servicesDetails->address_line1 = $model->Address1;
            $servicesDetails->address_line2 = $model->Address2;
            $servicesDetails->alternate_phone = $model->AlternatePhone;
            $servicesDetails->address_city = $model->City;
            $servicesDetails->address_state = $model->State;
            $servicesDetails->address_pin_code = $model->PinCode;
            $servicesDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($servicesDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }*/
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    
    
    
    public function getServicesDetails($Id) {
        try {
            $query = "SELECT * FROM KG_Car_cleaning_service WHERE CustId = $Id AND status=0 ORDER BY Id ASC";
            
            $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

    public function checkingCarService($cId) {
        try {
            $service = CarWashService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
            if (empty($service)) {
                $result = "No Service";
                return $result;
            } else {
                $query = "DELETE FROM KG_Car_cleaning_service WHERE CustId = $cId";
                YII::app()->db->createCommand($query)->execute();
                $result = "Yes Service";
                return $result;
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getcustomerServicesCar($Id) {
        try {
            
            $customer = CarWashService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $Id, ':status' => '0'));
            
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
    
    public function getcustomerServicesCarStatus($cId) {
        try { 
            $servicesDetails = CarWashService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
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
    
    public function storeOrdernumberofCar($cId,$orderId,$orderNo) {
        try { 
            $servicesDetails = CarWashService::model()->findByAttributes(array(), 'CustId=:CustId AND status=:status', array(':CustId' => $cId, ':status' => '0'));
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

}
?>
