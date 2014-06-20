<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class OrderForm extends CFormModel
{
	
        public $Id;
        public $ParentId;
        public $CustId;
        public $ServiceId;
        public $OrderNo;
        public $Amount;
        
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
            return array(
                array('Id, ParentId, CustId, ServiceId, OrderNo, Amount', 'safe'),
            );
	}

        
        
        /*public function myvalidtions($attribute,$params){error_log("enter-----------");
            error_log("----".$attribute."----".$params);
            $params =array();
            $req = CValidator::createValidator('EmailIds', $this,array('EmailIds'),$params);
            $req->validate($this);
        }*/
	
}
