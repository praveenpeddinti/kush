<?php

/**
 * BasicinfoForm class.
 * BasicinfoForm is the data structure for keeping
 * basicinfo form data. It is used by the 'Basicinfo' action of 'UserController'.
 */
class BasicinfoForm extends CFormModel {

    public $Id;
    public $FirstName;
    public $MiddleName;
    public $LastName;
    public $Password;
    public $RepeatPassword;
    public $IdentityProof;
    public $Number;
    public $Gender;
    public $profilePicture;
    public $uIdDocument;
    public $dateOfBirth;
    public $foundKushgharBy;
    public $foundKushgharByOther;
    

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('FirstName, LastName','required', 'message' => 'Please enter a value for {attribute}.'),
            //array('foundKushgharBy', 'required', 'message' => 'Please Select one.'),
            array('foundKushgharBy', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('foundKushgharBy', 'compare', 'compareValue'=>"Other")),
                'then' => array(
                array('foundKushgharByOther', 'required','message' => 'Please enter a value for Other source.'),
                array('foundKushgharByOther', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Other Source can only contain Alphabet and space'),),
            ),
//            array('foundKushgharByOther','required','message'=>'Other source is required '),
            // password needs to be authenticated
            //array('Password', 'authenticate'),
            //array('Password', 'required', 'on' => 'insert'),
            array('RepeatPassword', 'compare', 'compareAttribute' => 'Password',
                'message' => 'Password and Confirm Password need to be same'
            ),
           /*array('IdentityProof', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                       'if' => array(
                           array('IdentityProof', 'in', 'range'=>array('1','2','3','4','5','6','7'), 'allowEmpty'=>false)
                           //array('IdentityProof', 'compare', 'compareAttribute'=>'IdentityProof', 'allowEmpty'=>true),
                       ),
                       'then' => array(
                           array('Number', 'required','message'=>'Please enter a value for Id Number'),
                       ),),*/
            //array('RepeatPassword', 'compare', 'compareAttribute' => 'Password',
            //    'message' => 'Password  and Repeat Password must be match'
            //),
            //array('IdentityProof','compare','compareAttribute'=>'Select Proof of Identify','operator'=>'<', 'operator'=>'=','allowEmpty'=>false,'message'=>'{attribute} must be greater than "{compareValue}".')
            // First Name, Last Name must be Alphabet and space
            array('FirstName, MiddleName, LastName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),
            array('FirstName, MiddleName, LastName,Password,RepeatPassword,IdentityProof,Number,Gender,profilePicture,uIdDocument,dateOfBirth,foundKushgharBy,foundKushgharByOther,Id', 'safe'),
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