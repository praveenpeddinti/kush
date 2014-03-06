<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactInfoForm extends CFormModel {

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
            array('Email, Phone, Address1, City, PinCode, Landmark', 'required', 'message' => 'Please enter a value for {attribute}.'),
            // email has to be a valid email address
            array('Email', 'email'),
            array('Phone, AlternatePhone', 'numerical'),
            array('City', 'match', 'pattern' => '/^[a-zA-Z0-9]+$/', 'message' => '{attribute} can only contain Alphabet and digits'),
            array('PinCode', 'numerical'),
            array('cardNumber', 'length', 'min'=>6),
            array('State', 'required', 'message' => 'Please Select {attribute}.'),
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