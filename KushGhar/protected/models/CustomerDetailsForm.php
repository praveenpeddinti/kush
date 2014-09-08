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
            array('FirstName, LastName,Email,Phone,AlternatePhone,Address1, City, PinCode, Landmark,cardHolderName, cardNumber', 'required', 'message' => 'Please enter {attribute}.'),
           // First Name, Last Name must be Alphabet and space
            array('FirstName, MiddleName, LastName, cardHolderName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),

            // Email has to be a valid email address
            array('Email', 'email'),
            //array('Phone,AlternatePhone', 'numerical', 'integerOnly'=>true),
            //array('Phone,AlternatePhone', 'length', "min" => "10"),
            array('Phone, AlternatePhone','numerical','integerOnly'=>true,'min'=>1111111111,'tooSmall'=>'{attribute} is too short(minimum is 10 characters)',),
            array('City', 'match', 'pattern' => '/^[a-zA-Z0-9\s]+$/', 'message' => '{attribute} can only contain alphabet and digits'),
            array('PinCode', 'numerical', 'integerOnly'=>true),
            //array('cardNumber', 'length', 'min'=>6),
            array('State,cardType,expiryMonth,expiryYear', 'required', 'message' => 'Please select {attribute}.'),
            array('cardNumber', 'match', 'pattern' => '/^[X0-9]+$/', 'message' => '{attribute} can only contain numbers'),
            //array('cardNumber', 'numerical'),
            array('cardNumber', 'length', 'min'=>16),
            //array(' expiryMonth, expiryYear', 'required', 'message' => 'Please enter Expiry Date'),
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