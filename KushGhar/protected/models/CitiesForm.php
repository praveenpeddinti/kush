<?php

/**
 * SettingForm class.
 * SettingsForm is the data structure for keeping
 * settings form data. It is used in the actions of 'SettingsController'.
 */
class CitiesForm extends CFormModel {
    public $Id;
    public $StateId;
    public $Status;
    public $CityName;
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('Id,StateId, Status, CityName', 'safe'),
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
