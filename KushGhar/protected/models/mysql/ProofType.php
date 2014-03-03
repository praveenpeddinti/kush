<?php

class ProofType extends CActiveRecord {

    public $Id;
    public $identifiability;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'KG_UniqueIdentifiability';
    }

    public function getIdentifyProof() {
        try {
            $proofTypes = ProofType::model()->findAll();
        } catch (Exception $ex) {
            
        }
        return $proofTypes;
    }

    

}
?>