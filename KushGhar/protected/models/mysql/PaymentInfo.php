<?php

class PaymentInfo extends CActiveRecord {

    public $customer_payment_id;
    public $customer_id;
    public $payment_order;
    public $payment_type;
    public $card_type;
    public $card_holder_name;
    public $card_number;
    public $card_expiry_month;
    public $card_expiry_year;
    public $secure_code;
    public $update_email_user;
    public $create_timestamp;
    public $update_timestamp;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_customer_payment';
    }

    public function saveCustomerPaymentDumpInfoDetails($cId) {
        try {
            $paymentDetails = new PaymentInfo();
            $paymentDetails->customer_id = $cId;
            $paymentDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($paymentDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    //New payment Information Store -----
    public function updateCustomerPaymentData($model, $cId) {
        try {
            $paymentDetails = PaymentInfo::model()->findByAttributes(array('customer_id' => $cId));
            $paymentDetails->card_type = $model->cardType;
            $paymentDetails->card_holder_name = $model->cardHolderName;
            $paymentDetails->card_number = $model->cardNumber;
            $paymentDetails->card_expiry_month = $model->expiryMonth;
            $paymentDetails->card_expiry_year = $model->expiryYear;
            //$paymentDetails->secure_code = $model->secureCode;
            $paymentDetails->first_name = $model->FirstName;
            $paymentDetails->last_name = $model->LastName;
            $paymentDetails->phone = $model->Phone;
            $paymentDetails->address1 = $model->Address1;
            $paymentDetails->address2 = $model->Address2;
            $paymentDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($paymentDetails->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    public function getCustomerPaymentDetails($id) {
        try {
            $customerpaymentDetails = PaymentInfo::model()->findByAttributes(array('customer_id' => $id));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $customerpaymentDetails;
    }

}
?>