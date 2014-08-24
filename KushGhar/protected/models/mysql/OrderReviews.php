<?php
class OrderReviews extends CActiveRecord {
    public $CustId;
    public $order_number;
    public $service_type;
    public $filled_by;
    public $is_publish;
    public $Team_Arrive_Time;
    public $Team_Professional_Appearance;
    public $Office_Staff_Rating;
    public $Home_Service_Rating;
    public $Overall_Experience;
    public $Service_Vacuuming_Rating;
    public $Service_Dusting_Rating;
    public $Service_Moping_Rating;
    public $Service_TrashDisposal_rating;
    public $Service_Addional_Rating;
    public $rating;
    public $feedback;
    public $create_timestamp;
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Customer_reviews';
    }
    public function addCustomerReview($model) {
        try {   
            $customerReviews = new OrderReviews();
            $customerReviews->CustId = $model->CustID;
            $customerReviews->order_number = $model->OrderNumber;
            $customerReviews->service_type=$model->ServiceType;
            if(Yii::app()->session['Type']=='Admin'){
                $customerReviews->filled_by=1;
            }
            else if(Yii::app()->session['Type']=='Customer'){
                $customerReviews->filled_by=2;
            }
            $customerReviews->Team_Arrive_Time = $_POST['arrive_on_time'];
            $customerReviews->Team_Professional_Appearance = $_POST['professional_appearance'];
            $customerReviews->Office_Staff_Rating=$_POST['officeStaff'];
            $customerReviews->Home_Service_Rating=$_POST['homeService'];
            $customerReviews->Overall_Experience=$_POST['overAllExp'];
            if($model->ServiceType==1){
            $customerReviews->Service_Vacuuming_Rating=$_POST['vaccuming'];
            $customerReviews->Service_Dusting_Rating=$_POST['dusting'];
            $customerReviews->Service_Moping_Rating=$_POST['moping'];
            $customerReviews->Service_TrashDisposal_rating=$_POST['trash'];
            $customerReviews->Service_Addional_Rating=$_POST['aservices'];
            }
            else{
            $customerReviews->Service_Vacuuming_Rating="-1";
            $customerReviews->Service_Dusting_Rating="-1";
            $customerReviews->Service_Moping_Rating="-1";
            $customerReviews->Service_TrashDisposal_rating="-1";
            $customerReviews->Service_Addional_Rating="-1";
            }
            $customerReviews->feedback = $model->Feedback;
            $customerReviews->rating = $model->Rating;
            $customerReviews->service_type=$model->ServiceType;
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
            $query = "select cr.id,CONCAT_WS(' ',c.first_name,c.middle_name,c.last_name) as UserName,cr.rating,cr.feedback,cr.is_publish,o.CustId,o.ServiceId from KG_Customer c inner join KG_Customer_reviews cr on c.customer_id=cr.CustId inner join KG_Order_details o on o.order_number=cr.order_number ORDER BY cr.create_timestamp DESC limit ".$startLimit. ",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        } catch (Exception $ex) {
            error_log("##########Exception Occurred retrieve Data#############" . $ex->getMessage());
        }
        return $result;
    }
    public function getReviewExist($id){
        try{
            $query = "select count(*) as count from KG_Customer_reviews where order_number=".$id;
            $result = Yii::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("##########Exception Occurred retrieve count#############" . $ex->getMessage());
        }
        return $result['count'];
    }

    /*
    * @Praveen feedback is published in the home page when the check the is publish checkbox in User review/feedback tab in admin side
    */
    public function getIspublishReview($id,$val){
        if($val=='true'){$is_publish=1;}
        if($val=='false'){$is_publish=0;}
        $result = "failed";
        try{
            $customerReviews = OrderReviews::model()->findByAttributes(array('id'=>$id));
            $customerReviews->is_publish = $is_publish;
            if($customerReviews->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
}?>