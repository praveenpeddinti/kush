<?php

class VendorIndividualDocuments extends CActiveRecord {

    public $vendor_individual_document_id;
    public $vendor_individual_id;
    public $vendor_id;
    public $type_of_proof;
    public $proof_number;
    public $proof_image_file_location;
    public $type_of_address;
    public $address_number;
    public $address_image_file_location;
    public $type_of_clearance;
    public $clearance_number;
    public $clearance_image_file_location;
    public $create_timestamp;
    public $update_timestamp;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_vendor_individual_documents';
    }

    //New Vendor Individual Registration
    public function saveVendorDocumentsDumpInfo($vendorIndividualId,$model) {
    try {
            $vendorDetails = new VendorIndividualDocuments();
            $vendorDetails->vendor_individual_id = $vendorIndividualId;
            $vendorDetails->vendor_id = $model->vendorType;
            $vendorDetails->type_of_proof = $model->Proof_of_Identity;
            $vendorDetails->proof_number = $model->Identity_proof_Number;
            $vendorDetails->proof_image_file_location = $model->Identity_proof_document;
            $vendorDetails->type_of_address=$model->Proof_of_Address;
            $vendorDetails->address_number=$model->Address_Proof_Number;
            $vendorDetails->address_image_file_location=$model->Address_proof_document;
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

    public function getVendorDocumentsWithIndividual($Vid) {
        try {
            $vendorDetails = VendorIndividualDocuments::model()->findByAttributes(array('vendor_individual_id' => $Vid));
        } catch (Exception $ex) {
            error_log("############Error Occurred= in usergetDetails= #############" . $ex->getMessage());
        }
        return $vendorDetails;
    }


    //Update Vendor Documents Details from basic Information Controller action1
    public function updateVendorDocuments($model, $VId) {
        try {
            $VendorObj = VendorIndividualDocuments::model()->findByAttributes(array('vendor_individual_id' => $VId));
            $VendorObj->type_of_proof = $model->Proof_of_Identity;
            $VendorObj->proof_number = $model->Identity_proof_Number;
            $VendorObj->proof_image_file_location = $model->uIdDocument;
            $VendorObj->type_of_address=$model->Proof_of_Address;
            $VendorObj->address_number=$model->Address_Proof_Number;
            $VendorObj->address_image_file_location=$model->AddrPfDocument;
            $VendorObj->type_of_clearance=$model->Proof_of_Clearance;
            $VendorObj->clearance_number=$model->Clearance_Proof_Number;
            $VendorObj->clearance_image_file_location=$model->clrPfDocument;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
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
    public function UpdateClrPfDocument($id,$type,$number,$doc){
        try{
            $VendorObj=VendorIndividualDocuments::model()->findByAttributes(array('vendor_individual_id'=>$id));
            $VendorObj->type_of_clearance=$type;
            $VendorObj->clearance_number=$number;
            $VendorObj->clearance_image_file_location=$doc;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            if ($VendorObj->update()) {
                $result = "success";
            } else {
                $result = "failed";
            }
        }  catch (Exception $ex){
            error_log("######## Exception occured in Update Clearance document########".$ex->getMessage());
        }
    }

}
?>
