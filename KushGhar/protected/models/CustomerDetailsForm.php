<?php

/**
 * BasicinfoForm class.
 * BasicinfoForm is the data structure for keeping
 * basicinfo form data. It is used by the 'Basicinfo' action of 'UserController'.
 */
class CustomerDetailsForm extends CFormModel {

    public $Id;
    public $FirstName;
    public $MiddleName;
    public $LastName;
    public $Gender;
    public $dateOfBirth;
    public $profilePicture;
    public $Email;
    public $Phone;
    public $AlternatePhone;
    public $Address1;
    public $Address2;
    public $State;
    public $City;
    public $PinCode;
    public $Landmark;
    public $cardType;
    public $cardHolderName;
    public $cardNumber;
    public $expiryMonth;
    public $expiryYear;
    

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('FirstName, LastName', 'required', 'message' => 'Please enter a value for {attribute}.'),
           // First Name, Last Name must be Alphabet and space
            array('FirstName, MiddleName, LastName, cardHolderName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),
            array('FirstName, MiddleName, LastName, Gender, dateOfBirth, profilePicture, Email, Phone, AlternatePhone, Address1, Address2, State, City, PinCode, Landmark, cardType, cardHolderName, cardNumber, expiryMonth, expiryYear', 'safe'),
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