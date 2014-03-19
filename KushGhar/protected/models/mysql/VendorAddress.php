<?php

class VendorAddress extends CActiveRecord {

    
    public $vendor_address_id;
    public $vendor_id;
    public $vendor_individual_id;
    public $vendor_business_id;
    public $address_type;
    public $address_line1;
    public $address_line2;
    public $address_city;
    public $email_address;
    public $address_state;
    public $year_business_started;
    public $address_pin_code;
    public $address_landmark;
    public $address_notes;
    public $create_timestamp;
    public $update_timestamp;
    public $update_user_email;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_vendor_address';
    }

    

     //New Vendor Agency Registration
    public function saveVendorAddressDumpInfo($vendorIndividualId,$vTypeId) {
    try {error_log("viID==".$vendorIndividualId."==TypevID===".$vTypeId);
            $vendorDetails = new VendorAddress();
            $vendorDetails->vendor_id = $vTypeId;
            if($vTypeId == 1){
            $vendorDetails->vendor_individual_id = $vendorIndividualId;
            }
            if($vTypeId == 2){
            $vendorDetails->vendor_business_id = $vendorIndividualId;
            }
            
            $vendorDetails->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($vendorDetails->save()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred saveData#############" . $ex->getMessage());
        }
        return $result;
    }

    public function getVendorAddressDetails($vId,$vTypeId) {

        try {
            if($vTypeId==1){
            $vendorAddressDetails = VendorAddress::model()->findByAttributes(array('vendor_individual_id' => $vId));
            }
            if($vTypeId==2){
            $vendorAddressDetails = VendorAddress::model()->findByAttributes(array('vendor_business_id' => $vId));
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $vendorAddressDetails;
    }

     //Update Vendor Address Details from contact Information Controller action4
    public function updateVendorAddressDetails($model, $vId,$vTypeId) {
        try {error_log("1enter VendorDetails Model======================");

            if($vTypeId==1){
            $VendorObj = VendorAddress::model()->findByAttributes(array('vendor_individual_id' => $vId));
            }
            if($vTypeId==2){
            $VendorObj = VendorAddress::model()->findByAttributes(array('vendor_business_id' => $vId));
            }
            $VendorObj->address_line1 = $model->Address1;
            $VendorObj->address_line2 = $model->Address2;
            $VendorObj->alternate_phone = $model->AlternatePhone;
            $VendorObj->address_state = $model->State;
            $VendorObj->address_city = $model->City;
            $VendorObj->address_pin_code = $model->PinCode;
            $VendorObj->address_landmark = $model->Landmark;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            error_log("enter VendorAddressDetails Model======================");
            if ($VendorObj->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        } catch (Exception $ex) {
            error_log("##########Exception Occurred updateData#############" . $ex->getMessage());
        }
        return $result;
    }

    

}
?>
