<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class CarWashForm extends CFormModel {
    public $Id;
    public $ServicesId;
    public $TotalCars;
    public $DifferentLocation;
    public $WeekDays;
    public $ServiceStartTime;
    //public $CompanyName;
    //public $LicenseNumber;
    public $MakeOfCar;
    //public $ModelOfCar;
    //public $CallMe;
    public $DifferentAddress;
    public $AlternatePhone;
    public $InteriorCleaning;
    //public $InteriorColor;
    public $ExteriorCleaning;
    public $ExteriorColor;
    //public $WaxCar;
    public $ShampooSeats;
    public $Address1;
    public $Address2;
    public $State;
    public $City;
    public $PinCode;
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
             
            array('PriceFlag, HouseCleaning, CarCleaning, StewardCleaning, TotalCars, WeekDays, DifferentLocation, ServiceStartTime, MakeOfCar, DifferentAddress,
                  AlternatePhone, ExteriorCleaning, ExteriorColor, InteriorCleaning, ShampooSeats, 
                  Address1, Address2, State, City, PinCode, Status, ServicesId, Id', 'safe'),
            //array('HouseCleaning, CarCleaning, StewardCleaning, TotalCars, DifferentLocation, CompanyName, LicenseNumber, MakeOfCar, ModelOfCar, CallMe, DifferentAddress,
            //      AlternatePhone, InteriorCleaning, InteriorColor, ExteriorCleaning, ExteriorColor, WaxCar, ShampooSeats, 
             //     Address1, Address2, State, City, PinCode, Status, ServicesId, Id', 'safe'),
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