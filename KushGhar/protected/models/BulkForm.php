<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BulkForm extends CFormModel
{
	
        public $EmailIds;
        
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
            return array(
                //array('EmailIds', 'required','message'=>'Please enter a value for {attribute}.'),
                array('EmailIds', 'my_required'),
                array('EmailIds', 'safe'),
                       
		
		);
	}

	public function my_required($attribute_name, $params) {
        if (empty($this->EmailIds)) {
            $this->addError('EmailIds', 'Please enter Email Id(s)');
        }
        $email = array();
        $email = explode(",", $this->EmailIds);
        for ($i = 0; $i < sizeof($email); $i++) {
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email[$i])) {
                $this->addError('EmailIds', $email[$i] . ' Invalid email format');
            }
        }
    }

}
