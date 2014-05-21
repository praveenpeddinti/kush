<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'Registration' action of 'UserController'.
 */
class HouseCleaningForm extends CFormModel {
    public $Id;
    public $SquareFeets;
    public $LivingRooms;
    public $BedRooms;
    public $Kitchens;
    public $BathRooms;
    public $WindowGrills;
    public $FridgeInterior;
    public $MicroWaveOven;
    public $Laundry;
    public $Status;
    public $HouseCleaning;
    public $CarCleaning;
    public $StewardCleaning;
    
    
    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            //array('SquareFeets',  'required', 'message' => 'Please enter a value for {attribute}.'),
            array('HouseCleaning, CarCleaning, StewardCleaning, SquareFeets, LivingRooms, BedRooms, Kitchens, BathRooms, WindowGrills, FridgeInterior, MicroWaveOven, Laundry, Status, Id', 'safe'),
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