<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $Name;
	public $Email;
	public $Subject;
	public $Body;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('Name, Email, Subject, Body', 'required'),
			// email has to be a valid email address
			array('Email', 'email'),
			
			
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