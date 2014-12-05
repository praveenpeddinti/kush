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
    public function actionAutoLogin(){       
        $model = new LoginForm;
        $model->UserId=$_POST['email'];
        $model->Password=$_POST['password'];
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
        echo $this->rendering($obj);
        Yii::app()->end();
        // }
        } catch (Exception $exc) {
            error_log("_EXCEPTION____" . $exc->getMessage());
            Yii::log($exc->getMessage(), 'error', 'MobileController');
        }
    }
    public function actionOrderDetails() {
        $data = array();
        $customerDetails = $this->kushGharService->getOrderDetails($_POST['UserId']);
        $data['count']=  count($customerDetails);
        $data['data']=$customerDetails;
        $data['status'] = "success";
        echo json_encode($data);
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
    public function actionSaveBasicInfo(){
        parse_str($_POST["formdata"], $values);
        $cId = $_POST['UserId'];
        $basicForm = new BasicinfoForm;
        $basicForm->FirstName=$values['BIFirstName'];
        $basicForm->MiddleName=$values['BIMiddleName'];
        $basicForm->LastName=$values['BILastName'];
        $basicForm->dateOfBirth=$values['BIDateofbirth'];
        if(isset($values['Gender']))
            $basicForm->Gender=1;
        else 
            $basicForm->Gender=0;
        
        $result = $this->kushGharService->updateRegistrationData($basicForm, $cId);
        $data=array();
        if ($result == "success") {
            $data['status']='success';
            $data['message']="Basic Information Updated successfully";
        } else {
            $data['status']='Failure';
            $data['message']="please try again";
        }
        echo json_encode($data);
    }
    public function actionChangePswd(){
        parse_str($_POST["formdata"], $values);
        $cId = $_POST['UserId'];
        $model = new updatedPasswordForm;
        $model->Password=$values['CPPassword'];
        $result = $this->kushGharService->getupdatedPasswordInBasicInfo($model, $cId);
        $data=array();
        if ($result == "success") {
            $data['password']=$values['CPPassword'];
            $data['status']='success';
            $data['message']="Password Updated successfully";
        } else {
            $data['status']='Failure';
            $data['message']="please try again";
        }
        echo json_encode($data);
    }
    public function actionSaveContactInfo(){
        parse_str($_POST["formdata"], $values);
        $ContactInfoForm = new ContactInfoForm;
        $cId = $_POST['UserId'];
        //$cityName=  $this->kushGharService->getCityNameByCityId($values['CICity']);
        $ContactInfoForm->Email=$values['CIEmail'];
        $ContactInfoForm->Phone=$values['CIPhone'];
        $ContactInfoForm->AlternatePhone=$values['CIAlternatephone'];
        $ContactInfoForm->Address1=$values['CIAddress1'];
        $ContactInfoForm->Address2=$values['CIAddress2'];
        if($values['CILocation']!='')
            $ContactInfoForm->Location=$values['CILocation'];
        else
            $ContactInfoForm->Location=$values['hdnLocation'];
        $ContactInfoForm->State=$values['CIState'];
        if($values['CICity']!='')
            $ContactInfoForm->City=$values['CICity'];
        else
            $ContactInfoForm->City=$values['hdnCity'];
        $ContactInfoForm->PinCode=$values['CIPincode'];
        $ContactInfoForm->Landmark=$values['CILandmark'];
        $result1 = $this->kushGharService->updateRegistrationinContactData($ContactInfoForm, $cId);
        $result = $this->kushGharService->saveCustomerInfoDetails($ContactInfoForm, $cId);
        $data=array();
        if ($result == "success") {
            $data['status']='success';
            $data['message']="Contact Information Updated successfully";
        } else {
            $data['status']='Failure';
            $data['message']="please try again";
        }
        echo json_encode($data);
    }
    public function actionDynamicCities(){
        $cities=  $this->kushGharService->getAllCitiesByState($_POST['state']);
        $count=  $this->kushGharService->getAllCitiesByStateCount($_POST['state']);
        $data = array();
        $data['status']='success';
        $data['count']=$count;
        $data['cities']=$cities;
        echo json_encode($data);
    }
    public function actionDynamicLocations(){
        $locations=  $this->kushGharService->getAllLocationsByCity($_POST['city']);
        $count=  $this->kushGharService->getAllLocationsByCityCount($_POST['city']);
        $data = array();
        $data['status']='success';
        $data['count']=$count;
        $data['location']=$locations;
        echo json_encode($data);
    }
    public function actionGetOrderDetails(){
        try {             
            if (!empty($_POST['assignVendors'])) {
                $vendordetails = $this->kushGharService->getVendorDetails($_POST['orderId'], $_POST['assignVendors']);
            } else {  
                $vendordetails = '';
            }
            if ($_POST['serviceType'] == 1) { 
                $servicedetails = $this->kushGharService->getOrderHServicesDetails($_POST['orderId']);
                $CustId = $servicedetails['CustId'];
                $ServiceDate = $servicedetails['houseservice_start_time'];
            }
            if ($_POST['serviceType'] == 2) { 
                $servicedetails = $this->kushGharService->getOrderCServicesDetails($_POST['orderId']);
                foreach ($servicedetails as $ee) {
                    $CustId = $ee['CustId'];
                    $ServiceDate = $ee['carservice_start_time'];
                }
            }
            if ($_POST['serviceType'] == 3) { 
                $servicedetails = $this->kushGharService->getOrderSServicesDetails($_POST['orderId']);
                $CustId = $servicedetails['CustId'];
                $ServiceDate = $servicedetails['start_time'];
            }
            $data=array();
            $data['status']='success';
            $data['services']=$servicedetails;
            $data['ServiceId']=$_POST['serviceType'];
            $data['ServiceDate']=$ServiceDate;
            $data['serviceStatus']=$_POST['serviceStatus'];
            $data['Vendors']=$vendordetails;
            echo json_encode($data);
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
        
    }
    public function actionUploadPfPic(){  
        try{            
            $userId=$_REQUEST['UserId'];
            $imgarr=  explode('.', $_FILES["postFile"]["name"]);
            $destPath=$this->findUploadedPath() . '/images/profile/'.$userId."_Profile.".$imgarr[1];
            if(file_exists($destPath)) 
                unlink($destPath);
            move_uploaded_file($_FILES["postFile"]["tmp_name"], $destPath); 
            $dbname='/images/profile/'.$userId.'_Profile.'.$imgarr[1];
            $result=  $this->kushGharService->saveProfilePicture($dbname,$userId);
        }
        catch(Exception $ex){
            error_log("Exception eccurred in uploading profile pic---Mobile====".$ex->getMessage());
        }
    }
    function findUploadedPath() {
        try {
            $path = dirname(__FILE__);
            $pathArray = explode('/', $path);
            $appendPath = "";
            for ($i = count($pathArray) - 3; $i > 0; $i--) {
                $appendPath = "/" . $pathArray[$i] . $appendPath;
            }
            $originalPath = $appendPath;
        } catch (Exception $ex) {
            error_log("#########Exception Occurred in finding path--Mobile########".$ex->getMessage());
        }
        return $originalPath;
    }
    function actionLoadNewOrderHC(){
        try{
            $cid=$_POST['userId'];
            $states=  $this->kushGharService->getStates();
            $cities=  $this->kushGharService->getAllCitiesView();
            $customerDetails = $this->kushGharService->getCustomerDetails($cid);
            $customerAddressDetails = $this->kushGharService->getCustomerAddressDetails($cid);
            $getServiceDetails=  $this->kushGharService->getcustomerServicesHouse($cid);
            if($getServiceDetails=='No Service'){$houseService='';}
            else{$houseService=  $this->kushGharService->getDetails($cid);}
            $data=array();
            $data['count']= sizeof($houseService);
            $data['ServiceDetails']=$houseService;
            $data['customerDetails']=$customerDetails;
            $data['custAddrDetails']=$customerAddressDetails;
            $data['states']=$states;
            $data['cities']=$cities;
            $data['datastatus']="success";
            echo json_encode($data);
        } catch (Exception $ex) {
            error_log("####Exception occurred in loading new order for house cleaning-- Mobile#####".$ex->getMessage());
        }
    }
    function actionSaveHouseOrder(){
        try{
            parse_str($_POST["formdata"], $values);
            $houseModel = new HouseCleaningForm;
            $cId = $_POST['UserId'];
            $houseModel->HouseType=$values['newHouseType'];
            $houseModel->SquareFeets=$values['newSqft'];
            $houseModel->ServiceStartTime=$values['newServicedate'];
            $houseModel->LivingRooms=$values['newLivingRoom'];
            $houseModel->BedRooms=$values['newBedRoom'];
            $houseModel->Kitchens=$values['newKitchen'];
            $houseModel->BathRooms=$values['newBathRoom'];
            $houseModel->OtherRooms=$values['newOtherRoom'];
            if(isset($values['WindowGrills']))
                $houseModel->WindowGrills=1;
            else 
                $houseModel->WindowGrills=0;
            if(isset($values['CupboardInterior']))
                $houseModel->CupBoard=1;
            else 
                $houseModel->CupBoard=0;
            if(isset($values['FridgeInterior']))
                $houseModel->FridgeInterior=1;
            else 
                $houseModel->FridgeInterior=0;
            if(isset($values['MicroWaveInterior']))
                $houseModel->MicroWaveOven=1;
            else 
                $houseModel->MicroWaveOven=0;
            if(isset($values['sameContactInfo']))
                $houseModel->DifferentAddress=1;
            else 
                $houseModel->DifferentAddress=0;
            $houseModel->Address1=$values['newAddress1'];
            $houseModel->Address2=$values['newAddress2'];
            $houseModel->AlternatePhone=$values['newAlternatephone'];
            if($values['CIState']!='')
                $houseModel->State=$values['CIState'];
            else
                $houseModel->State=$values['hdnHouseState'];
            if($values['CICity']!='')
                $houseModel->City=$values['CICity'];
            else
                $houseModel->City=$values['hdnHouseCity'];
            $houseModel->PinCode=$values['newPincode'];
            $rows = $this->kushGharService->checkingHouseService($cId);
            if($rows=='No Service'){
                $result = $this->kushGharService->addHouseCleaningService($houseModel, $cId,$rows);
            }else{
                $result = $this->kushGharService->updateHouseCleaningService($houseModel, $cId,$rows);
            }
            $data=array();
            if ($result == "success") {
                $data['status']='success';
                $data['message']="Contact Information Updated successfully";
            } else {
                $data['status']='Failure';
                $data['message']="please try again";
            }
            echo json_encode($data);
        } catch (Exception $ex) {
            error_log("#### Exception while saving the house order dat --mobile####".$ex->getMessage());
        }
    }
    function actionPriceQuoteHC(){
        $cId = $_POST['userId'];
        $getServiceDetails=  $this->kushGharService->getcustomerServicesHouse($cId);
        if($getServiceDetails=='No Service'){
            $houseService='';
        }
        else{
            $houseService=  $this->kushGharService->getDetails($cId);
        }
        $amount=$houseService['squarefeets']*1.5;
        $data=array();
        $data['amount']=$amount;
        $data['serviceDetails']=$houseService;
        $data['dataStatus']='success';
        echo json_encode($data);
    }
    function actionPlaceOrderHC(){
        $cId = $_POST['userId'];
        $genOrderNo = '';
        $HOrder='';
        $customerDetails = $this->kushGharService->getCustomerDetails($cId);
        $customerServicesHouse = $this->kushGharService->getcustomerServicesHouse($cId);
        $getOrderDetailsMaxParentId = $this->kushGharService->getOrderDetailsMaxParentId();
        $genOrderNo = $getOrderDetailsMaxParentId['id'];
        $storeOrderDetailsOfParent = $this->kushGharService->storeOrderDetailsOfParent($cId);
        $getOrderNumber='';
        $getServiceDetails='0';
        $servicedate='';
        if($customerServicesHouse=='Yes Service') {
            $getServiceDetails = $this->kushGharService->getDetails($cId);
            $priceAddServices = (($getServiceDetails['window_grills'] + $getServiceDetails['cupboard_cleaning'] + $getServiceDetails['fridge_interior'] + $getServiceDetails['microwave_oven_interior']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
      
//$otherRoomsCost = ($getServiceDetails['other_rooms']*YII::app()->params['ADDITIONAL_SERVICE_COST1']);
//            if( ($getServiceDetails['total_livingRooms']==1) && ($getServiceDetails['total_bedRooms']==1) && ($getServiceDetails['total_bathRooms']==1) && ($getServiceDetails['total_kitchens']==1))
//                    {
//                    $priceRoom1 = (($getServiceDetails['total_livingRooms'] + $getServiceDetails['total_bedRooms']) * YII::app()->params['ADDITIONAL_SERVICE_COST1']);
//                    $priceRoom2 = (($getServiceDetails['total_bathRooms'] + $getServiceDetails['total_kitchens']) * YII::app()->params['ADDITIONAL_SERVICE_COST']);
//                    $totalRoomsPrice = $otherRoomsCost+$priceRoom1 + $priceRoom2 ;
//                    }else{$LR='';$BedR='';$BathR='';$KR='';
//                         if($getServiceDetails['total_livingRooms']>1){
//                             $LR = (($getServiceDetails['total_livingRooms']-1)*YII::app()->params['ADDITIONAL_SERVICE_COST1']);
//                         }
//                         if($getServiceDetails['total_bedRooms']>1){
//                             $BedR = (($getServiceDetails['total_bedRooms']-1)*YII::app()->params['ADDITIONAL_SERVICE_COST1']);
//                         }
//                         if($getServiceDetails['total_bathRooms']>1){
//                             $BathR = (($getServiceDetails['total_bathRooms']-1)* YII::app()->params['ADDITIONAL_SERVICE_COST']);
//                         }
//                         if($getServiceDetails['total_kitchens']>1){
//                             $KR = (($getServiceDetails['total_kitchens']-1)* YII::app()->params['ADDITIONAL_SERVICE_COST']);
//                         }
                    
//                    $priceRoom1  = $LR+$BedR;
//                    $priceRoom2 = $BathR+$KR;
//                    $totalRoomsPrice = $otherRoomsCost+$priceRoom1 + $priceRoom2 +750;
//            if($getServiceDetails['squarefeets']<1000)
//                $sqft=1000;
//            else
//                $sqft=$getServiceDetails['squarefeets'];
            $sqft=($getServiceDetails['squarefeets']<1000)?1000:$getServiceDetails['squarefeets'];
            $totalRoomsPrice=$sqft*1.5;
                   // }
                    
                    $totalRoomsPrice+= $priceAddServices;
             
//            $serviceTaxPrice = (($priceRoom1+$priceRoom2+$priceAddServices)*12.36)/100;
            
            $storeOrderDetailsOfHouse = $this->kushGharService->storeOrderDetailsOfHouse($cId,$getOrderDetailsMaxParentId['id'],$getServiceDetails['CustId'],$genOrderNo,'1',$totalRoomsPrice,$getServiceDetails['houseservice_start_time']);
            $getOrderDetailsMaxParentIdH = $this->kushGharService->getOrderDetailsMaxParentId();
            $storeOrdernumberofHouse = $this->kushGharService->storeOrdernumberofHouse($cId,$getOrderDetailsMaxParentIdH['id'],$getOrderDetailsMaxParentIdH['order_number']);
            $getOrderNumber = $getOrderDetailsMaxParentIdH['order_number'];
            $genOrderNo = $genOrderNo+1;
            $HOrder = $genOrderNo;
            
        }else{$getServiceDetails='0';}
        //$subject = "Place Order";
       $messages = "The Order Number is <b>".$getOrderNumber."</b>";
        $mess = "The Order Number is <b>".$getOrderNumber."</b>\r\n\n";
        $mess = $mess."Customer Name is ".$customerDetails['first_name']."\r\n\n";
        $mess = $mess."Phone Number is ".$customerDetails['phone']."\r\n\n";
        $messKG = $mess;
                /*
                  * Customer Mail Details
                  */
                $to1 = $customerDetails['email_address'];
                $subject1 =$getOrderNumber." Order placed";
                $Logo = YII::app()->params['SERVER_URL'] . "/images/color_logo.png";
                $employerEmail = "no-reply@kushghar.com";
                $messageview1="orderplacemessage";
                $params1 = array('Logo' => $Logo, "customerDetails" => $customerDetails, 'HouseService'=>$getServiceDetails,'HO'=>$HOrder);
                /*
                 * KG Team mail details
                 */
                $to = 'praveen.peddinti@gmail.com';
                $subject ="Order placed";
                $messageview="orderplacemessagetoKG";
                $params = array('Logo' => $Logo, 'Message' =>$customerDetails, 'HouseService'=>$getServiceDetails);
                //$params = '';
                $sendMailToUser=new CommonUtility;
                $sendMailToUser->actionSendmail($messageview1,$params1, $subject1, $to1,$employerEmail);
                $mailSendStatus=$sendMailToUser->actionSendmail($messageview,$params, $subject, $to,$employerEmail);
                $data=array();
                $data['dataStatus']="success";
                $data['message']='Order submitted successfully';
                echo json_encode($data);
    }

}?>