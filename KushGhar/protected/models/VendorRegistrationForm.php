<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class VendorRegistrationForm extends CFormModel {
    public $Id;
    public $vendorType;
    public $FirstName;
    public $LastName;
    public $PrimaryContactFirstName;
    public $PrimaryContactLastName;
    public $AgencyName;
    public $Email;
    public $Phone;
    public $Password;
    public $RepeatPassword;
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // First Name, Email, Phone, Password and Repeat Password are required
            array('Email,Phone, Password, RepeatPassword', 'required', 'message' => 'Please enter a value for {attribute}.'),
            array('vendorType', 'required', 'message' => 'Please Select Vendor Type.'),
            //array('AFirstName', 'required', 'message' => 'Please enter a value for Primary Contact First Name.'),
            //array('ALastName', 'required', 'message' => 'Please enter a value for Primary Contact Last Name.'),
            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"1")),
                'then' => array(
                array('FirstName,LastName,', 'required','message' => 'Please enter a value for {attribute}.'),
                array('FirstName,LastName,', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),),
            ),
            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"")),
                'then' => array(
                array('FirstName,LastName,', 'required','message' => 'Please enter a value for {attribute}.'),
                array('FirstName,LastName,', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),),
            ),

            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"2")),
                'then' => array(
                array('PrimaryContactFirstName, PrimaryContactLastName,AgencyName', 'required'),
                array('PrimaryContactFirstName,PrimaryContactLastName,AgencyName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),),
            ),
            // Email has to be a valid email addressAFirstName,ALastName,AgencyName,
            array('Email', 'email'),
            // Phone min 10 digits
            
            array('Phone', 'numerical', 'integerOnly'=>true),
            array('Phone', 'length', "min" => "10"),
            // password needs to be authenticated
            //array('Password', 'authenticate'),
            array('Password', 'required', 'on' => 'insert'),
            array('RepeatPassword', 'compare', 'compareAttribute' => 'Password',
                'message' => 'Password  and Confirm Password need to be same'
            ),
            
            array('vendorType,FirstName,LastName,PrimaryContactFirstName,PrimaryContactLastName,AgencyName,Email,Phone,Password,RepeatPassword,Id', 'safe'),
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