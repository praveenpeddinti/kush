<?php

class StewardsCleaningService extends CActiveRecord {

    public $ServiceId;
    public $CustId;
    public $event_type;
    public $event_name;
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
            error_log("model strtTime and End Time=====".$model->StartTime."====".$model->totalStewards);
            $servicesDetails = new StewardsCleaningService();
            $servicesDetails->ServiceId = 2;
            $servicesDetails->CustId = $cId;
            //$servicesDetails->event_type = $Event[0];
            //$servicesDetails->event_name = $Event[1];
            $servicesDetails->event_type = $model->EventType;
            $servicesDetails->event_name = $model->EventName;
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
    
    
    
    
    public function getServicesDetails($Id) {
        try {
            $query = "SELECT * FROM KG_Stewards_cleaning_service WHERE CustId = $Id ORDER BY Id DESC LIMIT 1";
            error_log("query==========".$query);
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

    

}
?>
