<?php

class VendorIndividualDocuments extends CActiveRecord {

    public $vendor_individual_document_id;
    public $vendor_individual_id;
    public $vendor_id;
    public $type_of_proof;
    public $proof_number;
    public $proof_image_file_location;
    public $create_timestamp;
    public $update_timestamp;
    

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_vendor_individual_documents';
    }

    //New Vendor Individual Registration
    public function saveVendorDocumentsDumpInfo($vendorIndividualId,$vTypeId) {
    try {error_log("viID==".$vendorIndividualId."==TypevID===".$vTypeId);
            $vendorDetails = new VendorIndividualDocuments();
            $vendorDetails->vendor_individual_id = $vendorIndividualId;
            $vendorDetails->vendor_id = $vTypeId;
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
        try {error_log("1enter VendorDetails Model======================");
            $VendorObj = VendorIndividualDocuments::model()->findByAttributes(array('vendor_individual_id' => $VId));


            $VendorObj->type_of_proof = $model->IdentityProof;
            $VendorObj->proof_number = $model->Number;
            $VendorObj->proof_image_file_location = $model->uIdDocument;
            $VendorObj->update_timestamp = gmdate("Y-m-d H:i:s", time());
            error_log("enter VendorDetails Model======================");
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
