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
    
    
    
    public function getTotalOrders($stype){
        try{ 
            if($stype=='0'){
             $query = "SELECT count(*) as count FROM KG_Order_details where ServiceId!='' ";
            }else {
               $query = "SELECT count(*) as count FROM KG_Order_details WHERE ServiceId=$stype";  
            }
            
            
            //$query = "SELECT count(*) as count FROM KG_Order_details where ServiceId!='' ";
                 
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    } 

   /*public function getTotalUsers(){
        try{            
            $query = "SELECT count(*) as count FROM KG_InvitationUsers";
                   
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    } 
   public function getAllUsers($start,$end){
        try{            
            $query = "SELECT * FROM KG_InvitationUsers where status =1 limit ".$start. ",".$end;
                
            $result = Yii::app()->db->createCommand($query)->queryAll();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result;
    }
    public function getStatusUser($id,$val){
        //if($val==0){$status=1;}
        //if($val==1){$status=0;}
        $result = "failed";
        try{
            $InviteObj = InviteUser::model()->findByAttributes(array('Id'=>$id));
            //$InviteObj->status = $status;
            if($InviteObj->delete())
            //if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    public function sendInviteMailToUser($id,$val){error_log("------".$id."------".$val);
        if($val==0){$status=1;}
        if($val==1){$status=2;}
        if($val==2){$status=2;}
        $result = "failed";
        try{
            $InviteObj = InviteUser::model()->findByAttributes(array('Id'=>$id));
            $InviteObj->invite = $status;
            if($InviteObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }*/
    


    

    

    

     

    

}

?>
