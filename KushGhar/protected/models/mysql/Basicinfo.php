<?php

class Basicinfo extends CActiveRecord {

    public $Id;
    public $customerId;
    public $uId;
    public $uIdNumber;
    public $uIdDocument;
    public $DOB;
    public $profilePicture;
    public $Gender;
    public $customerQuestionId;
    public $createdDateTime;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'CustomerBasic';
    }

    /**
     * New Basic information store in DB
     */
    public function saveCustomerBasicDetails($model, $cId) {
        try {
            $sampleDetails = new Basicinfo();
            $sampleDetails->customerId = $cId;
            $sampleDetails->uId = $model->IdentityProof;
            $sampleDetails->uIdNumber = $model->Number;
            $sampleDetails->Gender = $model->Gender;
            $sampleDetails->profilePicture = $model->profilePicture;
            $sampleDetails->uIdDocument = $model->uIdDocument;
            $sampleDetails->createdDateTime = gmdate("Y-m-d H:i:s", time());
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
