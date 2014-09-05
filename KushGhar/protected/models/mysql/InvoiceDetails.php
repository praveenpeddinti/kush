<?php

class InvoiceDetails extends CActiveRecord {

    public $id;
    public $CustId;
    public $ServiceId;
    public $orderId;
    public $InvoiceNumber;
    public $Amount;
    public $Status;
    public $create_timestamp;
    public $update_timestamp;
       
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_Invoice_details';
    }

    public function getInvoiceDetailsMaxId() {
        try {
            $query = "SELECT * FROM KG_Invoice_details ORDER BY id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function storeInvoiceDetails($CustId,$ServiceId,$OrderNo,$Amount,$InvoiceNo) {
                try {
                $invoice = new InvoiceDetails();
                $invoice->CustId = $CustId;
                $invoice->ServiceId = $ServiceId;
                $invoice->OrderId = $OrderNo;
                $invoice->Status = 0;
                $invoice->Amount = $Amount;
                $invoice->InvoiceNumber = $InvoiceNo;
                $invoice->create_timestamp = gmdate("Y-m-d H:i:s", time());
                $invoice->update_timestamp = gmdate("Y-m-d H:i:s", time());
                
                if (!$invoice->save())
                    $result = "false";//return CHtml::errorSummary($this);
                else
                    $result = "success";
            } catch (Exception $ex) {
                error_log("=====Exception occurred in saveModel====" . $ex->getMessage());
            }
       
        return $result;
    }
    
    public function getInvoiceDetails($OrderId) {
        try {
            $query = "SELECT * FROM KG_Invoice_details WHERE OrderId =$OrderId";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
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
            $query = "SELECT * FROM KG_House_cleaning_service WHERE order_number = $oId ORDER BY Id DESC LIMIT 1";
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
    public function cancelUserOrderStatus($id){
        $query="update KG_Order_details set status=2 where order_number=".$id;
        $result1 = YII::app()->db->createCommand($query)->execute();
        if($result1>0)
            $result = "success"; 
    }
    public function getServiceType($id){
        $query="select ServiceId,CustId from KG_Order_details where order_number=".$id;
        $result = YII::app()->db->createCommand($query)->queryRow();
        return $result;
    }
    public function rescheduleHouseCleaning($serviceTime,$OrderNumber){
        $query="update KG_House_cleaning_service set houseservice_start_time='".$serviceTime."' where order_number=".$OrderNumber;
        $query1="update KG_Order_details set status=0, service_date='".$serviceTime."' where order_number=".$OrderNumber;
        $result = YII::app()->db->createCommand($query)->execute();
        $result1 = YII::app()->db->createCommand($query1)->execute();
        if($result>0||$result1>0)
         return "success";
        else 
            return "failure";
    }
    public function rescheduleCarWah($serviceTime,$OrderNumber){
        $query="update KG_Car_cleaning_service set carservice_start_time='".$serviceTime."' where order_number=".$OrderNumber;
        $query1="update KG_Order_details set status=0, service_date='".$serviceTime."' where order_number=".$OrderNumber;
        $result = YII::app()->db->createCommand($query)->execute();
        $result1 = YII::app()->db->createCommand($query1)->execute();
        if($result>0||$result1>0)
         return "success";
        else 
            return "failure";
    }
    public function rescheduleStewards($startTime,$endTime,$Duration,$OrderNumber){
        $query="update KG_Stewards_cleaning_service set start_time='".$startTime."' , end_time='".$endTime."' ,service_hours=".$Duration." where order_number=".$OrderNumber;
        $query1="update KG_Order_details set status=0, service_date='".$startTime."' where order_number=".$OrderNumber;
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
                $query="SELECT * FROM KG_House_cleaning_service where order_number=".$ordernumber;
            }
            else if($type==2){
                $query="SELECT * FROM KG_Car_cleaning_service where order_number=".$ordernumber;
            }
            else if($type==3){
                $query="SELECT * FROM KG_Stewards_cleaning_service where order_number=".$ordernumber;
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