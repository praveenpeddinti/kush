<?php
class OrderReviews extends CActiveRecord {
    public $CustId;
    public $order_number;
    public $rating;
    public $feedback;
    public $create_timestamp;
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Customer_reviews';
    }
    public function addCustomerReview($ordernumber,$rating,$feedback) {
        try { 
            $customerReviews = new OrderReviews();
            $customerReviews->CustId = Yii::app()->session['UserId'];
            $customerReviews->order_number = $ordernumber;
            $customerReviews->feedback = $feedback;
            $customerReviews->rating = $rating;
            $customerReviews->create_timestamp = gmdate("Y-m-d H:i:s", time());
                if ($customerReviews->save()) {
                    $result = "success";
                } else {
                    $result = "failed";
                }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }
    public function getUserReviews(){
        try{
            $query = "select count(*) as count from KG_Customer_reviews";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("##########Exception Occurred retrieve Data count#############" . $ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllUsersReviews($startLimit, $endLimit){
        try{
            $query = "select cr.id,CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) as UserName,cr.rating,cr.feedback,o.CustId,o.ServiceId from KG_Customer c inner join KG_Customer_reviews cr on c.customer_id=cr.CustId inner join KG_Order_details o on o.order_number=cr.order_number ORDER BY cr.create_timestamp DESC limit ".$startLimit. ",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        } catch (Exception $ex) {
            error_log("##########Exception Occurred retrieve Data#############" . $ex->getMessage());
        }
        return $result;
    }
}?>