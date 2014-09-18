<?php
/**
 * BasicinfoForm class.
 * BasicinfoForm is the data structure for keeping
 * basicinfo form data. It is used by the 'Basicinfo' action of 'UserController'.
 */
class VendorBasicInformationForm extends CFormModel {

    public $Id;
    public $FirstName;
    public $MiddleName;
    public $LastName;
    public $PrimaryContactFirstName;
    public $PrimaryContactMiddleName;
    public $PrimaryContactLastName;
    public $AgencyName;
    public $vendorType;
    public $Proof_of_Identity;
    public $Identity_proof_Number;
    public $uIdDocument;
    public $Gender;
    public $profilePicture;
    public $dateOfBirth;
    public $Website;
    public $Pan;
    public $Tin;
    public $foundKushgharBy;
    public $Services;
    public $Proof_of_Address;
    public $Address_Proof_Number;
    public $AddrPfDocument;
    public $Proof_of_Clearance;
    public $Clearance_Proof_Number;
    public $clrPfDocument;
    public $Identity_proof_document;
    public $Address_proof_document;
    public $Clearance_proof_document;
    
    /**ct one.'),
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            //array('FirstName, LastName', 'required', 'message' => 'Please enter a value for {attribute}.'),
            //array('foundKushgharBy', 'required', 'message' => 'Please Select one.'),
           array('Services,FirstName, MiddleName, LastName,PrimaryContactFirstName,PrimaryContactMiddleName,PrimaryContactLastName,AgencyName,Gender,profilePicture,dateOfBirth,Website,Pan,Tin,foundKushgharBy,Id,vendorType', 'safe'),
            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"1")),
                'then' => array(
                array('FirstName,LastName', 'required','message'=>'Please enter {attribute}.'),
                    array(' Services', 'required', 'message' => 'Please select Services'),
//array('Services', 'compare', 'operator'=>'!=', 'compareValue'=>'', 'message'=>'Please Selecst Services'),
                array('FirstName,MiddleName,LastName,', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),
               ),
            ),
            array('vendorType', 'ext.YiiConditionalValidator.YiiConditionalValidator',
                'if' => array(
                array('vendorType', 'compare', 'compareValue'=>"2")),
                'then' => array(
                array('PrimaryContactFirstName, PrimaryContactLastName,AgencyName', 'required'),
                array(' Services', 'required', 'message' => 'Please select Services'),
                array('PrimaryContactFirstName,PrimaryContactMiddleName,PrimaryContactLastName,AgencyName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain alphabet and space'),),
            ),
            //array('IdentityProof','compare','compareAttribute'=>'Select Proof of Identify','operator'=>'<', 'operator'=>'=','allowEmpty'=>false,'message'=>'{attribute} must be greater than "{compareValue}".')
            // First Name, Last Name must be Alphabet and space
            //array('FirstName, MiddleName, LastName', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => '{attribute} can only contain Alphabet and space'),
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