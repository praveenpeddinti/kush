<?php

class VendorBasicInformation extends CActiveRecord {

    public $vendor_address_id;
    public $vendor_id;
    public $vendor_business_id;
    public $vendor_individual_id;
    public $address_type;
    public $address_line1;
    public $address_line1;
    public $address_line2;
    public $address_city;
    public $address_state;
    public $address_pin_code;
    public $address_landmark;
    public $address_notes;
    public $createdDateTime;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '';
    }

    /**
     * New Basic information store in DB
     */
    public function saveVendorAddressDumpInfo($vId,$vendorIndividualId) {
        try {
            $sampleDetails = new VendorBasicInformation();
            $sampleDetails->vendor_id = $vId;
            $sampleDetails->vendor_individual_id = $vendorIndividualId;
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




}
?>
