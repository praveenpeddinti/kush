<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{
        public $Id;
	public $FirstName;
	public $LastName;
	public $Email;
	public $Phone;
        public $Password;
        public $RewritePassword;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('Email,Phone, Password, RewritePassword', 'required','message'=>'Please enter a value for {attribute}.'),
                        array('FirstName, LastName,Id', 'safe'),
			// email has to be a valid email address
			array('Email', 'email'),
                        array('Phone', 'length',"min"=>"10"),
                        // password needs to be authenticated
			//array('Password', 'authenticate'),
                        array('Password', 'required', 'on' => 'insert'),
            array('RewritePassword', 'compare', 'compareAttribute'=>'Password',
                'message'=>'Password  and Rewrite Password must be match'
                ),
			
			
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}