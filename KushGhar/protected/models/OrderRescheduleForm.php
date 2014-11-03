<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class OrderRescheduleForm extends CFormModel {
    public $ServiceType;
    public $StartTime;
    public $EndTime;
    public $DurationHours;
    public $ServiceStartTime;
    public $Reason;
    
    
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
             
            //array('HouseCleaning', 'required', 'message' => 'Please enter a value for {attribute}.'),
             
            array('StartTime, EndTime, DurationHours,ServiceStartTime,ServiceType,Reason', 'safe'),
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