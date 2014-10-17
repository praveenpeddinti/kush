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
                    $result = "false";
                    $invoiceDetails= $this->getInvoiceDetails($OrderNo);
                    if($invoiceDetails!=NULL){
                        $servicesDetails = InvoiceDetails::model()->findByAttributes(array(), 'OrderId=:OrderId', array(':OrderId' => $OrderNo));
                        $servicesDetails->CustId = $CustId;
                        $servicesDetails->ServiceId = $ServiceId;
                        $servicesDetails->Status = 0;
                        $servicesDetails->Amount = $Amount;
                        $servicesDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
                        if ($servicesDetails->update())
                           $result = "success";//return CHtml::errorSummary($this);
                    }
                    else{
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
                            $result = "success";//return CHtml::errorSummary($this);
                    }
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
            $query = "select count(*) as count,sum(Amount) as amount from KG_Invoice_details where Status =1";
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
    
    
    public function getAllPayments($start,$end){
        try{  
            $query = "select * from KG_Invoice_details WHERE status =1 ORDER BY OrderId DESC limit ".$start. ",".$end;
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
    
    
    
    
public function getPaidInvoice($id,$val){
        if($val==0){$status=1;}
        
        $result = "failed";
        try{
            $InvoiceObj = InvoiceDetails::model()->findByAttributes(array('id'=>$id));
            $InvoiceObj->Status = $status;
            if($InvoiceObj->update())
                $result = "success";
        }catch(Exception $ex){
             error_log("################Exception Occurred  changeContactStatus##############".$ex->getMessage());
        }
        return $result;
    }
    
    /*
     * @Praveen Update the Order in admin actions order tab
     */
    public function updateorderAmountWithAdmin($model,$Amount,$Type){
       $result="failed";
       try{
           if($Type=='Order'){
                $query="update KG_Order_details set amount=$Amount,is_Created_By_Admin=1 where order_number=".$model->CustId;
           }else if ($Type=='Invoice'){
                $query="update KG_Invoice_details set amount=$Amount where OrderId=".$model->CustId;
           }
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing status #########".$ex->getMessage());
       }
       return $result;
    }
    
    
    
}?>