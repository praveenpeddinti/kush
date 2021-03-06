<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class RegistrationForm extends CFormModel {
    public $Id;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Phone;
    public $Password;
    public $RepeatPassword;
    public $City;
    public $Location;
    


    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // First Name, Email, Phone, Password and Repeat Password are required
            array('FirstName,LastName,Email,Phone, Password, RepeatPassword', 'required', 'message' => 'Please enter {attribute}.'),
            // Email has to be a valid email address
            array('Email', 'email'),
            // Phone min 10 digits
            
            //array('Phone', 'numerical', 'integerOnly'=>true),
            //array('Phone', 'length', "min" => "10"),
            array('Phone','numerical','integerOnly'=>true,'min'=>1111111111,'tooSmall'=>'{attribute} is too short(minimum is 10 characters)',),
            // password needs to be authenticated
            //array('Password', 'authenticate'),
            array('Password', 'required', 'on' => 'insert'),
            array('RepeatPassword', 'compare', 'compareAttribute' => 'Password',
                'message' => ' Password and Confirm Password need to be same'

            ),
            // First Name, Last Name must be Alphabet and space
            array('FirstName, LastName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),
            
            array('FirstName,LastName,Email,Phone,Password,RepeatPassword,City,Id,Location', 'safe'),
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