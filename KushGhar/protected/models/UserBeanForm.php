<?php

/**
 * BasicinfoForm class.
 * BasicinfoForm is the data structure for keeping
 * basicinfo form data. It is used by the 'Basicinfo' action of 'UserController'.
 */
class UserBeanForm extends CFormModel {

    public $FirstName;
    public $LastName;
    public $Phone;
    public $Email;
    public $Location;
}