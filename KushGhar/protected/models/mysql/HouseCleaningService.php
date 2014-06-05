<?php

class HouseCleaningService extends CActiveRecord {

    public $CustId;
    public $squarefeets;
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
        try { error_log("have a service==============".$haveService);
            //$user = HouseCleaningService::model()->findByAttributes(array('CustId' => $cId));
            //error_log("uuuuuuuuuuuuuuu=============");
            //if($user==false){eror_log("falseeeeeeeeeeeeeeeeee");}else{error_log("yessssssssss");}
        
            $servicesDetails = new HouseCleaningService();
            $servicesDetails->CustId = $cId;
            $servicesDetails->squarefeets = $model->SquareFeets;
            $servicesDetails->total_livingRooms = $model->LivingRooms;
            $servicesDetails->total_bedRooms = $model->BedRooms;
            $servicesDetails->total_kitchens = $model->Kitchens;
            $servicesDetails->total_bathRooms = $model->BathRooms;
            $servicesDetails->window_grills = $model->WindowGrills;
            $servicesDetails->fridge_interior = $model->FridgeInterior;
            $servicesDetails->microwave_oven_interior = $model->MicroWaveOven;
            $servicesDetails->pooja_room_cleaning = $model->PoojaRoom;
            $servicesDetails->service_no_of_times = $model->NumberOfTimesServices;
            $servicesDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            
                if ($servicesDetails->save()) {
                    $result = "success";
                } else {
                    $result = "failed";
                }
                error_log("have a service==============".$haveService."===".$result);
           
            
            
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    public function updateHouseCleaningService($model,$cId,$haveService) {
        try { error_log("have a service=======update=======".$haveService);
            $servicesDetails = HouseCleaningService::model()->findByAttributes(array('CustId' => $cId));
            
        
            //$servicesDetails = new HouseCleaningService();
            $servicesDetails->CustId = $cId;
            $servicesDetails->squarefeets = $model->SquareFeets;
            $servicesDetails->total_livingRooms = $model->LivingRooms;
            $servicesDetails->total_bedRooms = $model->BedRooms;
            $servicesDetails->total_kitchens = $model->Kitchens;
            $servicesDetails->total_bathRooms = $model->BathRooms;
            $servicesDetails->window_grills = $model->WindowGrills;
            $servicesDetails->fridge_interior = $model->FridgeInterior;
            $servicesDetails->microwave_oven_interior = $model->MicroWaveOven;
            $servicesDetails->pooja_room_cleaning = $model->PoojaRoom;
            $servicesDetails->service_no_of_times = $model->NumberOfTimesServices;
            $servicesDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            
                if ($servicesDetails->update()) {
                    $result = "success";
                } else {
                    $result = "failed";
                }
                error_log("have a service==============".$haveService."===".$result);
           
            
            
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    
    
    public function getServicesDetails($Id) {
        try {
            $query = "SELECT * FROM KG_House_cleaning_service WHERE CustId = $Id ORDER BY Id DESC LIMIT 1";
            error_log("query==========".$query);
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

    public function checkingHouseService($cId) {
        try {
            $service = HouseCleaningService::model()->findByAttributes(array(), 'CustId=:CustId', array(':CustId' => $cId));
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

}
?>