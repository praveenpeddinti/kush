<?php

class Services extends CActiveRecord {

    public $Id;
    public $name;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Services';
    }

    public function getServices() {
        try {
            $serviceTypes = Services::model()->findAll();
        } catch (Exception $ex) {
            
        }
        return $serviceTypes;
    }
    
    public function getFeedbacksTotal5() {
        try {
            $query = "select cr.CustId,CONCAT(c.first_name, ' ', c.last_name, ' ',if(ISNULL(c.middle_name),'',c.middle_name)) Name,cr.is_publish,cr.rating,cr.feedback from KG_Customer c,KG_Customer_reviews cr where c.customer_id = cr.CustId and cr.is_publish=1 ORDER BY cr.create_timestamp DESC limit 5";
            $feedbackDetails = YII::app()->db->createCommand($query)->queryAll();
            
            
        } catch (Exception $ex) {
            error_log("getOrderDetails Exception occured==" . $ex->getMessage());
        }
        return $feedbackDetails;
    }
    
    public function getFeedbacks($a,$b) {
        try {
            $query = "select cr.CustId,CONCAT(c.first_name, ' ', c.last_name, ' ',if(ISNULL(c.middle_name),'',c.middle_name)) Name,cr.is_publish,cr.rating,cr.feedback from KG_Customer c,KG_Customer_reviews cr where c.customer_id = cr.CustId and cr.is_publish=1 limit $a , $b";
            $feedbackDetails = YII::app()->db->createCommand($query)->queryAll();
            
            
        } catch (Exception $ex) {
            error_log("getOrderDetails Exception occured==" . $ex->getMessage());
        }
        return $feedbackDetails;
    }

    

}
?>