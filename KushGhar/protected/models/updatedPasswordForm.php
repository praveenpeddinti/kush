<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class updatedPasswordForm extends CFormModel {

    public $Password;
    public $ConfirmPassword;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(

             array('Password, ConfirmPassword', 'required', 'message' => 'Please enter {attribute}.'),
            array('Password', 'required', 'on' => 'insert'),
            array('ConfirmPassword', 'compare', 'compareAttribute' => 'Password',
                'message' => ' Password and Confirm Password need to be same'
            ),
            array('Password,ConfirmPassword', 'safe'),
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