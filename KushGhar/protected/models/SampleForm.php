<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SampleForm extends CFormModel {

    public $Email;
    public $Phone;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // First Name, Email, Phone, Password and Repeat Password are required
            array('Email', 'required', 'message' => 'Please enter {attribute}.'),
            // email has to be a valid email address
            array('Email', 'email'),
            array('Email,Phone', 'safe'),
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