<?php

class OrderDetails extends CActiveRecord {

    public $parent_id;
    public $CustId;
    public $ServiceId;
    public $order_number;
    public $status;
    public $amount;
    public $create_timestamp;
    public $update_timestamp;
    

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
    
    public function storeOrderDetailsOfHouse($cId,$parentId,$CustId,$orderNo,$serviceId,$amount) {
                try {
                $order = new OrderDetails();
                $order->parent_id = $parentId+1;
                $order->CustId = $cId;
                $order->ServiceId = $serviceId;
                $order->order_number = ($orderNo+1);
                $order->status = 0;
                $order->amount = $amount;
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
            $query = "SELECT * FROM KG_House_cleaning_service WHERE order_id = $oId ORDER BY Id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getOrderSServicesDetails($oId) {
        try {
            $query = "SELECT * FROM KG_Stewards_cleaning_service WHERE order_id = $oId ORDER BY Id DESC LIMIT 1";
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    
    public function getOrderCServicesDetails($oId) {
        try {
            $query = "SELECT * FROM KG_Car_cleaning_service WHERE order_id = $oId ORDER BY Id ASC";
            
            $result = YII::app()->db->createCommand($query)->queryAll();
            
        } catch (Exception $ex) {
            error_log("getServiceDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }

}

?>
