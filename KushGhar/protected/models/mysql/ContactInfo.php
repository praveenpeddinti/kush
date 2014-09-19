<?php

class ContactInfo extends CActiveRecord {

    public $customer_address_id;
    public $customer_id;
    public $address_type;
    public $address_line1;
    public $address_line2;
    public $alternate_phone;
    public $address_city;
    public $address_state;
    public $address_pin_code;
    public $address_landmark;
    public $address_notes;
    public $create_timestamp;
    public $update_timestamp;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_customer_address';
    }

    public function saveCustomerAddressDumpInfoDetails($location,$cId) {
        try {
            $sampleDetails = new ContactInfo();
            $sampleDetails->customer_id = $cId;
            $sampleDetails->address_notes = $location;
            if ($sampleDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    //New Contact Information Store in DB
    public function saveCustomerInfoDetails($model, $cId) {
        try {
            $sampleDetails = ContactInfo::model()->findByAttributes(array('customer_id' => $cId));
            $sampleDetails->address_line1 = $model->Address1;
            $sampleDetails->address_line2 = $model->Address2;
            $sampleDetails->alternate_phone = $model->AlternatePhone;
            $sampleDetails->address_notes = $model->Location;
            $sampleDetails->address_state = $model->State;
            $sampleDetails->address_city = $model->City;
            $sampleDetails->address_pin_code = $model->PinCode;
            $sampleDetails->address_landmark = $model->Landmark;
            $sampleDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $sampleDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($sampleDetails->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    public function getCustomerAddressDetails($id) {
        try {
            $customerAddressDetails = ContactInfo::model()->findByAttributes(array('customer_id' => $id));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $customerAddressDetails;
    }
    
    //Update the contact info Details by the time of House cleaning and stewards service pages submitted
    public function updateCcontactInfoDetailsByServices($model, $cId) {
        try {
            $sampleDetails = ContactInfo::model()->findByAttributes(array('customer_id' => $cId));
            $sampleDetails->address_line1 = $model->Address1;
            $sampleDetails->address_line2 = $model->Address2;
            $sampleDetails->alternate_phone = $model->AlternatePhone;
            $sampleDetails->address_state = $model->State;
            $sampleDetails->address_city = $model->City;
            $sampleDetails->address_pin_code = $model->PinCode;
            $sampleDetails->create_timestamp = gmdate("Y-m-d H:i:s", time());
            $sampleDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($sampleDetails->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

}
?>