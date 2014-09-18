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
    public $ConfirmPassword;
    public $Proof_of_Identity;
    public $Identity_proof_Number;
    public $uIdDocument;
    public $Proof_of_Address;
    public $Address_Proof_Number;
    public $AddrPfDocument;
    public $Identity_proof_document;
    public $Address_proof_document;
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('vendorType,FirstName,LastName,PrimaryContactFirstName,PrimaryContactLastName,AgencyName,Email,Phone,Password,ConfirmPassword,Id,Proof_of_Identity,Identity_proof_Number,uIdDocument,Proof_of_Address,Address_Proof_Number,AddrPfDocument,Identity_proof_document,Address_proof_document', 'safe'),
            // First Name, Email, Phone, Password and Repeat Password are required
            array('Email,Phone, Password, ConfirmPassword,Identity_proof_Number,Address_Proof_Number', 'required', 'message' => 'Please enter {attribute}.'),
            array('vendorType,Proof_of_Identity,Proof_of_Address', 'required', 'message' => 'Please select {attribute}.'),
            //array('AFirstName', 'required', 'message' => 'Please enter a value for Primary Contact First Name.'),
            //array('ALastName', 'required', 'message' => 'Please enter a value for Primary Contact Last Name.'),
            array('Identity_proof_document,Address_proof_document','required','message'=>'Please upload {attribute}'),
            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"1")),
                'then' => array(
                array('FirstName,LastName,', 'required','message' => 'Please enter {attribute}.'),
                array('FirstName,LastName,', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),),
            ),
            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"")),
                'then' => array(
                array('FirstName,LastName,', 'required','message' => 'Please enter {attribute}.'),
                array('FirstName,LastName,', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),),
            ),

            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"2")),
                'then' => array(
                array('PrimaryContactFirstName, PrimaryContactLastName,AgencyName', 'required'),
                array('PrimaryContactFirstName,PrimaryContactLastName,AgencyName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),),
            ),
            // Email has to be a valid email addressAFirstName,ALastName,AgencyName,
            array('Email', 'email'),
            // Phone min 10 digits
            
            //array('Phone', 'numerical', 'integerOnly'=>true),
            //array('Phone', 'length', "min" => "10"),
            array('Phone','numerical','integerOnly'=>true,'min'=>1111111111,'tooSmall'=>'{attribute} is too short(minimum is 10 characters)',),
            // password needs to be authenticated
            //array('Password', 'authenticate'),
            array('Password', 'required', 'on' => 'insert'),
            array('ConfirmPassword', 'compare', 'compareAttribute' => 'Password',
                'message' => 'Password  and Confirm Password need to be same'
            ),
            
            
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