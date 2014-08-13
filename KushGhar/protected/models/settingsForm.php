<?php

/**
 * SettingForm class.
 * SettingsForm is the data structure for keeping
 * settings form data. It is used in the actions of 'SettingsController'.
 */
class SettingsForm extends CFormModel {
    public $id;
    public $makeId;
    public $status;
    public $make_name;
    public $model_name;
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('id,makeId, status, make_name,model_name', 'safe'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'verifyCode' => 'Verification Code',
        );
    }
    
    

}
