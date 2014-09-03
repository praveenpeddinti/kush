<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class VendorLoginForm extends CFormModel
{
	public $UserId;
	public $Password;
        public $VendorType;
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('UserId, Password', 'required','message'=>'Please enter {attribute}.'),
                    
                        array('UserId, Password, VendorType', 'safe'),
                       
		
		);
	}

	
	
}
