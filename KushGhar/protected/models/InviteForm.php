<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class InviteForm extends CFormModel
{
	public $FirstName;
	public $LastName;
        public $Email;
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
            return array(
                array('FirstName, LastName, Email', 'required','message'=>'Please enter a value for {attribute}.'),
                // Email has to be a valid email address
                array('Email', 'email'),
                array('FirstName, LastName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),
                array('FirstName, LastName, Email', 'safe'),
                       
		
		);
	}

	
	
}
