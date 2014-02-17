<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class BasicinfoForm extends CFormModel
{
        public $Id;
	public $FirstName;
	public $MiddleName;
	public $LastName;
	public $Password;
        public $RewritePassword;
        public $IdentityProof;
        public $Number;
        public $Gender;
        public $profilePicture;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('Password, RewritePassword, Number', 'required','message'=>'Please enter a value for {attribute}.'),
                        // password needs to be authenticated
			//array('Password', 'authenticate'),
                        array('Password', 'required', 'on' => 'insert'),
            array('RewritePassword', 'compare', 'compareAttribute'=>'Password',
                'message'=>'Password  and Rewrite Password must be match'
                ),
                    array('FirstName, MiddleName, LastName,Password,RewritePassword,IdentityProof,Number,Gender,profilePicture,Id', 'safe'),
			
			
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