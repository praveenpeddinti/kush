<?php

class MobileController extends Controller {
    public function init() {
        parent::init();
    }

    public function actionLogin() {
        $model = new LoginForm;
        parse_str($_POST["formdata"], $values);
        $model->UserId=$values['UserId'];
        $model->Password=$values['Password'];
        $result = $this->kushGharService->login($model, 'User');
        $data = array();
        if(isset($result)){
        $data['status']='success';
        $data['message']="Login success";
        $data['data']=$result;
        }
        else{
            $data['status']='error';
            $data['message']="Invalid Username and Password";
        }
        echo json_encode($data);
    }
    public function actionOrderDetails() {
        $data = array();
        //$customerDetails = $this->kushGharService->getCustomerDetails(1);
        $customerDetails = $this->kushGharService->getOrderDetails($_POST['UserId']);
        $data['data']=$customerDetails;
        $data['status'] = "success";
        echo json_encode($data);
    }
    public function actionRegistration() {
        try {
             $model = new RegistrationForm;
             if(isset($_POST["isMobile"]) && $_POST["isMobile"]==true){
             parse_str($_POST["formdata"], $values);
             $model->FirstName=$values['FirstName'];
             $model->LastName=$values['LastName'];
             $model->Email=$values['Email'];
             $model->Phone=$values['Phone'];
             $model->Password=$values['Password1'];
             $model->RepeatPassword=$values['RepeatPassword'];
               
             $Dresult = $this->kushGharService->getcheckUserExist($model);
             $data = array();
             
             if ($Dresult == 'No user') {
            $result = $this->kushGharService->saveRegistrationData($model);
            $getUserDetails = $this->kushGharService->getUserDetailsWithEmail($model->Email);
            $custAddressDetails = $this->kushGharService->saveCustomerAddressDumpInfoDetails('',$getUserDetails->customer_id);
            $paymentId = $this->kushGharService->saveCustomerPaymentDumpInfoDetails($getUserDetails->customer_id);
            $this->session['UserId'] = $getUserDetails->customer_id;
            $status = "success";
            $obj = array('status' => $status,'data' => $getUserDetails, 'error' => 'Login success');
        }
        else{
            $obj = array('status' => 'error', 'data' => '', 'error' => array("RegistrationForm_error" => 'User already exists'));
        }
        }
              // echo "success";
                echo $this->rendering($obj);
                   Yii::app()->end();
           // }
        } catch (Exception $exc) {
            error_log("_EXCEPTION____" . $exc->getMessage());
            Yii::log($exc->getMessage(), 'error', 'userController');
        }
    }
    public function actionInviteFriends(){
        $inviteFriends = new InviteForm;
        $inviteFriends->FirstName=$_POST['fname'];
        $inviteFriends->LastName=$_POST['lname'];
        $inviteFriends->Phone=$_POST['phone'];
        $inviteFriends->Email=$_POST['email'];
        $inviteFriends->City=$_POST['city'];
        $inviteFriends->Location=$_POST['location'];
        $inviteFriends->Referrer=$_POST['referrer'];
        $inviteUser = $this->kushGharService->checkNewUserExistInInviteTable($inviteFriends->Email);
        $custUser = $this->kushGharService->checkNewUserExistInCustomerTable($inviteFriends->Email);
        $data = array();
        if( ($inviteUser=='No user') && ($custUser=='No user')){
            $result = $this->kushGharService->getInvitationFriendUser($inviteFriends, 'Customer');
        }
        else{
            $result = 'failure';
            $errors = array("InviteForm_error" => 'User Exist.');
            $obj = array('status' => 'error', 'data' => '', 'error' => $errors); 
        }
        if ($result == "success") {
            /*
                * Customer Mail Details
            */
            $to1 = $inviteFriends->Email;
            $name = $inviteFriends->FirstName . ' ' . $inviteFriends->LastName;
            $phone = $inviteFriends->Phone;
            $city = $inviteFriends->City;
            $location = $inviteFriends->Location;
            $referrer=$inviteFriends->Referrer;
            $subject ='KushGhar Invitation';
            $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
            $employerEmail = "no-reply@kushghar.com";
            $messageview1="InvitationMail";
            $mess1 = 'http://113.193.178.88:6060/site/registration?Uname=' . $inviteFriends->Email . "\r\n\n";
            //$mess1 = 'http://www.kushghar.com/site/registration?Uname=' . $inviteFriends->Email . "\r\n\n";
            $params1 = array('Logo' => $Logo, 'Name' =>$name, 'Message' =>$mess1);
            /*
                * KG Team mail details
            */
            $to = 'praveen.peddinti@gmail.com';
            $messageview="CustomerInvitationMailToKGTeam";
            $params = array('Logo' => $Logo, 'Name' =>$name, 'Email' =>$to1, 'City' =>$city, 'Phone'=>$phone, 'Location'=>$location);
            //$params = '';
            $sendMailToUser=new CommonUtility;
            $sendMailToUser->actionSendmail($messageview1,$params1, $subject, $to1,$employerEmail);
            $mailSendStatusw=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
            $data['status']='success';
            $data['message']="Invitation sent successfully";
        }
        else{
            $data['status']='error';
            $data['message']="User already invited";
        }
        echo json_encode($data);
    }
    public function actionBasicProfile(){
        $customerId=$_POST['userId'];
        $customerDetails = $this->kushGharService->getCustomerDetails($customerId);
        $data = array();
        $data['status']='success';
        $data['data']=$customerDetails;
        echo json_encode($data);
    }
    public function actionContactProfile(){
        $customerId=$_POST['userId'];
        $states=  $this->kushGharService->getStates();
        $cities=  $this->kushGharService->getAllCitiesView();
        $locations=  $this->kushGharService->getAllLocationsView();
        $customerDetails = $this->kushGharService->getCustomerDetails($customerId);
        $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($customerId);
        $data = array();
        $data['status']='success';
        $data['customerDetails']=$customerDetails;
        $data['customerAddressDetails']=$customerAddressDetails;
        $data['states']=$states;
        $data['cities']=$cities;
        $data['locations']=$locations;
        echo json_encode($data);
    }
    public function actionChangePswd(){
        $cId = $_POST['userId'];
        $model = new updatedPasswordForm;
        $model->Password=$_POST['password'];
        $result = $this->kushGharService->getupdatedPasswordInBasicInfo($model, $cId);
        $data=array();
        if ($result == "success") {
            $data['password']=$_POST['password'];
            $data['status']='success';
            $data['message']="Password Updated successfully";
        } else {
            $data['status']='Failure';
            $data['message']="please try again";
        }
        echo json_encode($data);
    }
    public function actionContactInfo(){
                error_log("Contact Info===========1=========");
        $ContactInfoForm = new ContactInfoForm;
        error_log("Contact Info===========10=========");
        $cId = $_POST['userId'];
        error_log("Contact Info===========2=========");
        $ContactInfoForm->Email=$_POST['email'];
        error_log("Contact Info===========3=========");
        $ContactInfoForm->Phone=$_POST['phone'];
        $ContactInfoForm->AlternatePhone=$_POST['alternatephone'];
        $ContactInfoForm->Address1=$_POST['address1'];
        $ContactInfoForm->Address2=$_POST['address2'];
        error_log("Contact Info===========4=========");
        $ContactInfoForm->Location=$_POST['location'];
        $ContactInfoForm->State=$_POST['state'];
        $ContactInfoForm->City=$_POST['city'];
        $ContactInfoForm->PinCode=$_POST['pincode'];
        error_log("Contact Info===========5=========");
        $ContactInfoForm->Landmark=$_POST['landmark'];
        $result1 = $this->kushGharService->updateRegistrationinContactData($ContactInfoForm, $cId);
        error_log("Contact Info===========6=========");
        $result = $this->kushGharService->saveCustomerInfoDetails($ContactInfoForm, $cId);
        $data=array();
        error_log("Contact Info===========7=========");
        if ($result == "success") {error_log("Contact Info===========8=========");
            $data['status']='success';
            $data['message']="Contact Information Updated successfully";
        } else {error_log("Contact Info===========9=========");
            $data['status']='Failure';
            $data['message']="please try again";
        }
        echo json_encode($data);
    }
}

?>