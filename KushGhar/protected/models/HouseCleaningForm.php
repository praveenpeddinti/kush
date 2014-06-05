<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class HouseCleaningForm extends CFormModel {
    public $Id;
    public $CustId;
    public $SquareFeets;
    public $ServiceStartTime;
    public $LivingRooms;
    public $BedRooms;
    public $Kitchens;
    public $BathRooms;
    public $WindowGrills;
    public $FridgeInterior;
    public $MicroWaveOven;
    public $PoojaRoom;
    public $NumberOfTimesServices;
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
            //array('SquareFeets',  'required', 'message' => 'Please enter a value for {attribute}.'),
            array('CustId,PriceFlag, HouseCleaning, CarCleaning, StewardCleaning, SquareFeets, ServiceStartTime, LivingRooms, BedRooms, Kitchens, BathRooms, WindowGrills, FridgeInterior, MicroWaveOven, PoojaRoom, NumberOfTimesServices, Status, Id', 'safe'),
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