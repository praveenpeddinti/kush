<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class InviteForm extends CFormModel
{
	
        public $Email;
        public $InviteType;
        public $EmailIds;
        public $FirstName;
        public $LastName;
        public $Phone;
        public $City;
        public $HServices;
        public $CServices;
        public $SServices;
        public $Location;
	public $Referrer;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
            return array(
                array('InviteType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('InviteType', 'compare', 'compareValue'=>"0")),
                'then' => array(
                 array('FirstName,LastName,Email,City,Phone', 'required','message'=>'Please enter {attribute}.'),
                    array('FirstName, LastName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),
                 array('Email', 'email'),),
                ),
                array('Phone', 'numerical', 'integerOnly'=>true),
                array('Phone', 'length', "min" => "10"),
                array('InviteType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('InviteType', 'compare', 'compareValue'=>"1")),
                'then' => array(
                 //array('EmailIds', 'required','message'=>'Please enter a value for {attribute}.'),
                 //array('EmailIds', 'email'),
                 //array('EmailIds', 'myvalidtions'),
                    array('EmailIds','my_required'),
                    ),
                ),
                
                
                //array('Email', 'required','message'=>'Please enter a value for {attribute}.'),
                //array('EmailIds', 'required','message'=>'Please enter a value for {attribute}.'),
                // Email has to be a valid email address
                
                array(' FirstName,LastName,City,Phone,HServices,CServices,SServices,Email,EmailIds,Location,Referrer,InviteType', 'safe'),
                       
		
		);
	}

        
        
        /*public function myvalidtions($attribute,$params){error_log("enter-----------");
            error_log("----".$attribute."----".$params);
            $params =array();
            $req = CValidator::createValidator('EmailIds', $this,array('EmailIds'),$params);
            $req->validate($this);
        }*/
	
}
