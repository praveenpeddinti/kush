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

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('cardHolderName, cardNumber', 'required', 'message' => 'Please enter a value for {attribute}.'),
            // Card holde name must be Alphabet and space
            array('cardHolderName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),
            array(' expiryMonth, expiryYear', 'required', 'message' => 'Please enter Expiry Date'),
            array('cardType', 'required', 'message' => 'Please Select {attribute}.'),
            array('cardType, cardHolderName, cardNumber, expiryMonth, expiryYear, Id', 'safe'),
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