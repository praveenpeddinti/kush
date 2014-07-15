<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class StewardCleaningForm extends CFormModel {
    public $Id;
    public $ServicesId;
    public $EventType;
    public $EventName;
    public $ServiceStartTime;
    public $StartTime;
    public $EndTime;
    public $AttendPeople;
    public $Appetizers;
    public $Dinner;
    public $Dessert;
    public $Beverage;
    public $PostDinner;
    public $DurationHours;
    public $ServiceHours;
    public $totalStewards;
    public $Status;
    public $HouseCleaning;
    public $CarCleaning;
    public $StewardCleaning;
    public $PriceFlag;
    
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
             
            /*array('EventType, StartTime, EndTime', 'required', 'message' => 'Please Select {attribute}.'),
            array('EventType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('EventType', 'compare', 'compareValue'=>"7")),
                'then' => array(
                array('EventName', 'required','message' => 'Please enter a value for {attribute}.'),
                array('EventName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),),
            ),
            //array('AttendPeople', 'numerical', 'integerOnly'=>true),
            //array('AttendPeople', 'length', 'min'=>5),*/
            array('PriceFlag, HouseCleaning, CarCleaning, StewardCleaning, EventType, EventName, ServiceStartTime, totalStewards,StartTime, EndTime, AttendPeople, Appetizers, Dinner, Dessert, Beverage, PostDinner, DurationHours, ServiceHours, totalStewards,  Status, ServicesId, Id', 'safe'),
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