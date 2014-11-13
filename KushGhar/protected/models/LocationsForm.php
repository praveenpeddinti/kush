<?php

/**
 * SettingForm class.
 * SettingsForm is the data structure for keeping
 * settings form data. It is used in the actions of 'SettingsController'.
 */
class LocationsForm extends CFormModel {
    public $Id;
    public $CityId;
    public $LocationName;
    public $Status;
    public $CityName;


    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('Id,CityId, LocationName,Status,CityName', 'safe'),
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
