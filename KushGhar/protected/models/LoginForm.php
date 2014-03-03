<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $UserId;
	public $Password;
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('UserId, Password', 'required','message'=>'Please enter a value for {attribute}.'),
                    
                        array('UserId, Password', 'safe'),
                       
		
		);
	}

	
	
}
