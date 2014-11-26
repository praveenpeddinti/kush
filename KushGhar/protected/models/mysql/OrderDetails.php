<?php

class OrderDetails extends CActiveRecord {

    public $parent_id;
    public $CustId;
    public $ServiceId;
    public $order_number;
    public $status;
    public $amount;
    public $service_date;
    public $total_service_hours;
    public $total_service_people;
    public $is_Created_By_Admin;
    public $create_timestamp;
    public $update_timestamp;
    public $assign_vendors;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Order_details';
    }

    public function getOrderDetailsMaxParentId() {
        try {
            $query = "SELECT * FROM KG_Order_details ORDER BY id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function storeOrderDetailsOfParent($cId) {
                try {
                $order = new OrderDetails();
                $order->parent_id = '';
                $order->CustId = $cId;
                $order->ServiceId = '';
                $order->order_number = '';
                $order->status = 0;
                $order->amount = '';
                $order->create_timestamp = gmdate("Y-m-d H:i:s", time());
                $order->update_timestamp = gmdate("Y-m-d H:i:s", time());
                
                if (!$order->save())
                    $result = "false";//return CHtml::errorSummary($this);
                else
                    $result = "success";
            } catch (Exception $ex) {
                error_log("=====Exception occurred in saveModel====" . $ex->getMessage());
            }
       
        return $result;
    }
    
    public function storeOrderDetailsOfHouse($cId,$parentId,$CustId,$orderNo,$serviceId,$amount,$serviceDate) {
                try {
                $order = new OrderDetails();
                $order->parent_id = $parentId+1;
                $order->CustId = $cId;
                $order->ServiceId = $serviceId;
                $order->order_number = ($orderNo+1);
                $order->status = 0;
                $order->service_date=$serviceDate;
                $order->amount = $amount;
                $order->is_Created_By_Admin = $_SESSION['is_Assumed_By_Admin'];
                $order->create_timestamp = gmdate("Y-m-d H:i:s", time());
                $order->update_timestamp = gmdate("Y-m-d H:i:s", time());
                
                if (!$order->save())
                    $result = "false";//return CHtml::errorSummary($this);
                else
                    $result = "success";
            } catch (Exception $ex) {
                error_log("=====Exception occurred in saveModel====" . $ex->getMessage());
            }
       
        return $result;
    }
    public function getTotalOrdersForCustomer($type,$orderNo,$cId){
        try{
            
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId!='' and CustId = $cId";
            $result = Yii::app()->db->createCommand($query)->queryRow();

        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getTotalOrdersForVendor($type,$orderNo,$vId){
        try{
             $query="SELECT count(*) as count FROM KG_Order_details WHERE status=1 and find_in_set('".$vId."',assign_vendors)<>0";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    }


    public function getTotalOrders($type,$orderNo,$status){
        try{ 
            if(($type=='0') && ($orderNo=='0') && ($status=='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId!=''";   
            }else if(($type!='0') && ($orderNo=='0') && ($status=='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId=$type";     
            }else if(($type=='0') && ($orderNo!='0') && ($status=='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE order_number=$orderNo";     
            }else if(($type=='0') && ($orderNo=='0') && ($status!='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId!='' and status=$status";     
            }else if(($type!='0') && ($orderNo!='0') && ($status=='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId=$type and order_number=$orderNo";     
            }else if(($type!='0') && ($orderNo=='0') && ($status!=='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId=$type and status=$status";     
            }else if(($type=='0') && ($orderNo!='0') && ($status!=='20')){
             $query = "SELECT count(*) as count FROM KG_Order_details WHERE order_number=$orderNo and status=$status";     
            }else{
               $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId=$type and order_number=$orderNo and status=$status";  
            }
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    } 
public function sendorderStatus($id,$val){
        if($val==0){$status=0;}
        if($val==1){$status=1;}
        if($val==2){$status=2;}
        if($val==3){$status=3;}
        $result = "failed";
        try{
            $InviteObj = OrderDetails::model()->findByAttributes(array('id'=>$id));
            $InviteObj->status = $status;
            if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    
    
    public function getOrderHServicesDetails($oId) {
        try {
            //$query = "SELECT * FROM KG_House_cleaning_service WHERE order_number = $oId ORDER BY Id DESC LIMIT 1";
            $query = "SELECT h.*,o.reason FROM KG_House_cleaning_service h,KG_Order_details o WHERE h.order_number=o.order_number and h.order_number = $oId ORDER BY h.Id DESC LIMIT 1";
            
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getOrderSServicesDetails($oId) {
        try {
            $query = "SELECT * FROM KG_Stewards_cleaning_service WHERE order_number = $oId ORDER BY Id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getOrderCServicesDetails($oId) {
        try {
            $query = "SELECT * FROM KG_Car_cleaning_service WHERE order_number = $oId ORDER BY Id ASC";
            
            $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    public function cancelUserOrderStatus($reason,$id){
        $query="update KG_Order_details set status=2, reason='".$reason."', update_timestamp=now() where order_number=".$id;
        $result1 = YII::app()->db->createCommand($query)->execute();
        if($result1>0)
            //$result = "success"; 
            return "success";
    }
    public function getServiceType($id){
        $query="select ServiceId,CustId,id from KG_Order_details where order_number=".$id;
        $result = YII::app()->db->createCommand($query)->queryRow();
        return $result;
    }
    public function rescheduleHouseCleaning($serviceTime,$reason,$OrderNumber){
        $query="update KG_House_cleaning_service set houseservice_start_time='".$serviceTime."' where order_number=".$OrderNumber;
        $query1="update KG_Order_details set status=0, service_date='".$serviceTime."', reason='".$reason."', update_timestamp=now() where order_number=".$OrderNumber;
        $result = YII::app()->db->createCommand($query)->execute();
        $result1 = YII::app()->db->createCommand($query1)->execute();
        if($result>0||$result1>0)
         return "success";
        else 
            return "failure";
    }
    public function rescheduleCarWah($serviceTime,$reason,$OrderNumber){
        $query="update KG_Car_cleaning_service set carservice_start_time='".$serviceTime."' where order_number=".$OrderNumber;
        $query1="update KG_Order_details set status=0, service_date='".$serviceTime."', reason='".$reason."', update_timestamp=now() where order_number=".$OrderNumber;
        $result = YII::app()->db->createCommand($query)->execute();
        $result1 = YII::app()->db->createCommand($query1)->execute();
        if($result>0||$result1>0)
         return "success";
        else 
            return "failure";
    }
    public function rescheduleStewards($startTime,$endTime,$Duration,$reason,$OrderNumber){
        $noOfStewardsQuery="select no_of_stewards from Kushghar.KG_Stewards_cleaning_service where order_number=".$OrderNumber;
        $noOfStewards=YII::app()->db->createCommand($noOfStewardsQuery)->queryRow();
        $amt=$Duration * $noOfStewards['no_of_stewards'] * 200;
        $query="update KG_Stewards_cleaning_service set start_time='".$startTime."' , end_time='".$endTime."' ,service_hours=".$Duration." where order_number=".$OrderNumber;
        $query1="update KG_Order_details set status=0, service_date='".$startTime."' , amount=".$amt.", reason='".$reason."', update_timestamp=now() where order_number=".$OrderNumber;
        $result = YII::app()->db->createCommand($query)->execute();
        $result1 = YII::app()->db->createCommand($query1)->execute();
        if($result>0||$result1>0)
         return "success";
        else 
            return "failure";
    }
    public function getServiceDetails($ordernumber,$type){
        
        try{
            if($type==1){
                $query="SELECT h.*,o.reason FROM KG_House_cleaning_service h,KG_Order_details o where h.order_number=o.order_number and h.order_number=".$ordernumber;
            }
            else if($type==2){
                $query="SELECT c.*,o.reason FROM KG_Car_cleaning_service c,KG_Order_details o where c.order_number=o.order_number and c.order_number=".$ordernumber;
            }
            else if($type==3){
                $query="SELECT s.*,o.reason FROM KG_Stewards_cleaning_service s,KG_Order_details o where s.order_number=o.order_number and s.order_number=".$ordernumber;
            }
            $result = YII::app()->db->createCommand($query)->queryRow();
        }
        catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    /*
     * @Praveen Order status is closed that time store the total time and total peoples in DB 4-Aug-14
     */
    public function sendorderStatusWithTimeAndPeople($model,$val){
       $result = "failed";
        try{
            $InviteObj = OrderDetails::model()->findByAttributes(array('id'=>$model->OrderNo));
            $InviteObj->status = $val;
            $InviteObj->total_service_hours = $model->TotalServiceHours;
            $InviteObj->total_service_people = $model->TotalServicePeople;
            if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    public function getOrderDetailsById($id){
        try{
            $query="SELECT * FROM KG_Order_details where id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        }
        catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    public function sendorderScheduleStatus($id,$status,$vendorVals){
        $result = "failed";
        try{
            $InviteObj = OrderDetails::model()->findByAttributes(array('id'=>$id));
            $InviteObj->status = $status;
            $InviteObj->assign_vendors=$vendorVals;
            if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    
    public function getVendorDetails($Id,$vendors) {
        try {
            $query = "select o.CustId,o.service_date,v.vendor_id,v.first_name,v.last_name from KG_Order_details o,KG_vendor_individual v where v.vendor_id in ($vendors) and o.order_number=$Id";
            $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
}?>