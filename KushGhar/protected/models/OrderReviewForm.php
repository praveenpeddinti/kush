<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class OrderReviewForm extends CFormModel {
    public $OrderNumber;
    public $CustID;
    public $Rating;
    public $Feedback;
    public $Id;
    public $arrive_on_time;
    public $professional_appearance;
    public $rate_us;
    public $quality_of_service;
    public $ServiceType;
    public $Disclaimer;
    
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
             
            //array('HouseCleaning', 'required', 'message' => 'Please enter a value for {attribute}.'),
             
            array('OrderNumber,ServiceType, CustID, Rating,Feedback,Id,arrive_on_time,professional_appearance,rate_us,quality_of_service,Disclaimer', 'safe'),
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
