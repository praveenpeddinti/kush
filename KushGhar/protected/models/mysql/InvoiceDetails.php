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
    
    public function getTotalPayments(){
        try{
            $query = "select count(*) as count,sum(Amount) as amount from KG_Invoice_details";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
    
    
    public function getAllPayments($start,$end){
        try{  
            $query = "select * from KG_Invoice_details ORDER BY OrderId DESC limit ".$start. ",".$end;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
    
   
    public function getTotalInvoice($oNumber,$invoiceNo,$status){
        try{
            
            if(($oNumber=='')&&($invoiceNo=='')&&($status=='20'))
                $query = "select count(*) as count from KG_Invoice_details";
            else if(($oNumber=='')&&($invoiceNo=='')&&($status!='20'))
                $query="select count(*) as count from KG_Invoice_details where Status=".$status;
            else if(($oNumber!='')&&($invoiceNo=='')&&($status=='20'))
                $query="select count(*) as count from KG_Invoice_details where OrderId = ".$oNumber;
            else if(($oNumber=='')&&($invoiceNo!='')&&($status=='20'))
                $query="select count(*) as count from KG_Invoice_details where InvoiceNumber like '%".$invoiceNo."%'";
            else if(($oNumber=='')&&($invoiceNo!='')&&($status!='20'))
                $query="select count(*) as count from KG_Invoice_details where Status =".$status." and InvoiceNumber like '%".$invoiceNo."%'";
            else if(($oNumber!='')&&($invoiceNo=='')&&($status!='20'))
                $query="select count(*) as count from KG_Invoice_details where OrderId = ".$oNumber." and Status =".$status;
            else if(($oNumber!='')&&($invoiceNo!='')&&($status=='20'))
                $query="select count(*) as count from KG_Invoice_details where OrderId = ".$oNumber." and InvoiceNumber like '%".$invoiceNo."%'";
            else if(($oNumber!='')&&($invoiceNo!='')&&($status!='20'))
                $query="select count(*) as count from KG_Invoice_details where OrderId = ".$oNumber." and InvoiceNumber like '%".$invoiceNo."%' and Status=".$status;
           
//            $query = "SELECT count(*) as count FROM KG_InvitationUsers";
                  
            $result = Yii::app()->db->createCommand($query)->queryRow();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
        }
        return $result['count'];
    } 
   public function getAllInvoice($start,$end,$oNumber,$invoiceNo,$status){
        try{     
            if(($oNumber=='')&&($invoiceNo=='')&&($status=='20'))
                $query = "select * from KG_Invoice_details ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber=='')&&($invoiceNo=='')&&($status!='20'))
                $query="select * from KG_Invoice_details where Status=".$status. " ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber!='')&&($invoiceNo=='')&&($status=='20'))
                $query="select * from KG_Invoice_details where OrderId = ".$oNumber." ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber=='')&&($invoiceNo!='')&&($status=='20'))
                $query="select * from KG_Invoice_details where InvoiceNumber like '%".$invoiceNo."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber=='')&&($invoiceNo!='')&&($status!='20'))
                $query="select * from KG_Invoice_details where Status=".$oNumber." and InvoiceNumber like '%".$invoiceNo."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber!='')&&($invoiceNo=='')&&($status!='20'))
                $query="select * from KG_Invoice_details where OrderId = ".$oNumber." and Status=".$status." ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber!='')&&($invoiceNo!='')&&($status=='20'))
                $query="select * from KG_Invoice_details where OrderId = ".$oNumber." and InvoiceNumber like '%".$invoiceNo."%' ORDER BY id DESC limit ".$start. ",".$end;
            else if(($oNumber!='')&&($invoiceNo!='')&&($status!='20'))
                $query="select * from KG_Invoice_details where OrderId = ".$oNumber." and InvoiceNumber like '%".$invoiceNo."%' and Status=".$status." ORDER BY id DESC limit ".$start. ",".$end;
           
//            $query = "SELECT * FROM KG_InvitationUsers where status =1 ORDER BY id DESC limit ".$start. ",".$end;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        
        }catch(Exception $ex){
            error_log("################Exception Occurred  getAllContacts##############".$ex->getMessage());
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
    
    
    
}?>