<?php

/**
 * PaymentInfoForm class.
 * PaymentInfoForm is the data structure for keeping
 * paymentinfo form data. It is used by the 'paymentinfo' action of 'UserController'.
 */
class PaymentInfoForm extends CFormModel {

    public $Id;
    public $cardType;
    public $cardHolderName;
    public $cardNumber;
    public $expiryMonth;
    public $expiryYear;
    //public $secureCode;
    public $FirstName;
    public $LastName;
    public $Phone;
    public $Address1;
    public $Address2;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('cardHolderName, cardNumber, FirstName, LastName, Phone, Address1', 'required', 'message' => 'Please enter {attribute}.'),
            // Card holde name must be Alphabet and space
            array('cardHolderName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),
            array('cardNumber', 'match', 'pattern' => '/^[X0-9]+$/', 'message' => '{attribute} can only contain numbers'),
            //array('cardNumber', 'numerical'),
            array('cardNumber', 'length', 'min'=>16),
            array(' expiryMonth, expiryYear', 'required', 'message' => 'Please select Expiry Date'),
            array('cardType', 'required', 'message' => 'Please select {attribute}.'),
            array('FirstName, LastName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),
            //array('Phone', 'numerical', 'integerOnly'=>true),
            //array('Phone', 'length', "min" => "10"),
            array('Phone','numerical','integerOnly'=>true,'min'=>1111111111,'tooSmall'=>'{attribute} is too short(minimum is 10 characters)',),
            array('cardType, cardHolderName, cardNumber, expiryMonth, expiryYear, FirstName, LastName, Phone, Address1, Address2, Id', 'safe'),
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