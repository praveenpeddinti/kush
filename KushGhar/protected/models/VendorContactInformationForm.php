<?php

/**
 * BasicinfoForm class.
 * BasicinfoForm is the data structure for keeping
 * basicinfo form data. It is used by the 'Basicinfo' action of 'UserController'.
 */
class VendorContactInformationForm extends CFormModel {

    public $Id;
    public $Email;
    public $Phone;
    public $AlternatePhone;
    public $Address1;
    public $Address2;
    public $State;
    public $City;
    public $PinCode;
    public $Landmark;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('Email, Phone, Address1, PinCode, Landmark', 'required', 'message' => 'Please enter {attribute}.'),
            // email has to be a valid email address
            array('Email', 'email'),
            array('Phone, AlternatePhone', 'numerical', 'integerOnly'=>true),
            array('Phone, AlternatePhone', 'length', "min" => "10"),
            array('City', 'match', 'pattern' => '/^[a-zA-Z0-9\s]+$/', 'message' => '{attribute} can only contain alphabet and digits'),
            array('PinCode', 'numerical', 'integerOnly'=>true),
            array('PinCode', 'length', 'min'=>6),
            array('State, City', 'required', 'message' => 'Please select {attribute}.'),
            array('Email, Phone, AlternatePhone, Address1, Address2, State, City, PinCode, Landmark, Id', 'safe'),
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