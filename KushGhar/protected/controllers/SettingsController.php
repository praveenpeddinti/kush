<?php

class SettingsController extends Controller {

    public function init(){
        parent::init();
        if(!isset(Yii::app()->session['UserId']))
        {
            $this->redirect('/');
        }
        
    }
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //$this->layout = 'layout';
        $this->pageTitle="KushGhar-Index";
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    public function actionCarMakes(){
         try {
            $this->pageTitle="KushGhar-Settings";
            $this->render("carMakes");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    public function actionSettingsDashboard(){
        try{
            $this->pageTitle="KushGhar-Settings";
            $this->render("settingsDashboard");
        } catch (Exception $ex) {
            error_log("##########Exception Occurred########".$ex->getMessage());
        }
    }
    public function actionNewCarMakes(){
        try {           
                if (isset($_GET['userDetails_page'])) {
                $totalcount = $this->kushGharService->getCarMakes();
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllCarMakes($startLimit, $endLimit);
                $renderHtml = $this->renderPartial('newCarMakes', array('userDetails' => $userDetails, 'totalCount' => $totalcount), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totalcount);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
    }
    public function actionNewCarModels(){
        try {           
                if (isset($_GET['userDetails_page'])) {
                $totalcount = $this->kushGharService->getCarModels($_GET['makeId']);
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllCarModels($_GET['makeId'],$startLimit, $endLimit);
                $renderHtml = $this->renderPartial('newCarModels', array('userDetails' => $userDetails, 'totalCount' => $totalcount), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totalcount);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
    }
    public function actionChangeMakeStatus(){
        $changeUserStatus = $this->kushGharService->ChangeMakeStatus($_POST['Id'], $_POST['status']);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }
    public function actionEditMake(){
        try{            
            $Model = new SettingsForm;
            $getmakeDetails=$this->kushGharService->getMakeDetails($_POST['Id']);
            $renderHtml=  $this->renderPartial('editmake',array("model"=>$Model,"getmakeDetails"=>$getmakeDetails),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in editing the make ##########".$ex->getMessage());
        }
    }
    public function actionNewMake(){
        try{
            $Model = new SettingsForm;
            $renderHtml=  $this->renderPartial('newmake',array("model"=>$Model),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in editing the make ##########".$ex->getMessage());
        }
    }

    public function actionEditMakeSave(){
        $EditForm = new SettingsForm();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('SettingsForm');
        if ($formName != '') {
            $EditForm->attributes = $request->getParam('SettingsForm');
            $makeName = $this->kushGharService->checkNewMakeExistInMakeTable($EditForm->make_name);
            if($makeName=='No make'){
                $result = $this->kushGharService->UpdateMake($EditForm);
                $obj = array('status' => 'success', 'data' => $result, 'error' => 'Make Name updated successfully.');
            } else{
                $result = 'failure';
                $errors = array("SettingsForm_error" => 'Make Name already exists.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }
    public function actionNewMakeSave(){
        $NewForm = new SettingsForm();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('SettingsForm');
        if ($formName != '') {
            $NewForm->attributes = $request->getParam('SettingsForm');
            $makeName = $this->kushGharService->checkNewMakeExistInMakeTable($NewForm->model_name);
            if($makeName=='No make'){
                $result=  $this->kushGharService->NewMake($NewForm);
                $obj = array('status' => 'success', 'data' => $result, 'error' => 'Make Name added successfully.');
            } else{
                $result = 'failure';
                $errors = array("SettingsForm_error" => 'Make Name already exists.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }

    public function actionCarModels(){
        try {
            $this->pageTitle="KushGhar-Settings";
            $makename=  $this->kushGharService->getMakeNameByID($_REQUEST['MakeId']);
            $this->render('carModels',array('makeId' => $_REQUEST['MakeId'],'MakeName'=>$makename['make_name']));
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    public function actionEditModel(){
        try{
            $Model = new SettingsForm;
            unset($EditForm);
            $EditForm = new SettingsForm();
            if(isset($_POST['Id'])) $id=$_POST['Id'];
            else $id=-1;
            $makes=$this->kushGharService->getMakes();
            $getmodelDetails=$this->kushGharService->getModelDetails($id);
            $renderHtml=  $this->renderPartial('editmodel',array("model"=>$Model,"getmodelDetails"=>$getmodelDetails,"makes"=>$makes,"make"=>$_POST['makeId']),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {

        }
    }
    public function actionChangeModelStatus(){
        $changeUserStatus = $this->kushGharService->ChangeModelStatus($_POST['Id'], $_POST['status']);
        $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
        echo CJSON::encode($obj);
    }
    public function actionEditModelSave(){
        $EditForm = new SettingsForm();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('SettingsForm');
        if ($formName != '') {
            $EditForm->attributes = $request->getParam('SettingsForm');
            $makename=  $this->kushGharService->getMakeNameByID($EditForm->makeId);
            $modelName = $this->kushGharService->checkNewModelExistInModelTable($EditForm->model_name,$EditForm->makeId);
            if($modelName=='No model'){
                if($EditForm->id=='')
                    $result=  $this->kushGharService->newModel($EditForm,$makename['make_name']);
                else
                    $result = $this->kushGharService->UpdateModel($EditForm);
                $obj = array('status' => 'success', 'data' => $result, 'error' => 'Make Name updated successfully.');
            } else{
                $result = 'failure';
                $errors = array("SettingsForm_error" => 'Model already exists.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }
    public function actionCities(){
         try {
            $this->pageTitle="KushGhar-Settings";
            $this->render("cities");
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    public function actionNewCities(){
        try {           
                if (isset($_GET['userDetails_page'])) {
                $totalcount = $this->kushGharService->getAllCitiesCount();
                $startLimit = ((int) $_GET['userDetails_page'] - 1) * (int) $_GET['pageSize'];
                $endLimit = $_GET['pageSize'];
                $userDetails = $this->kushGharService->getAllCities($startLimit, $endLimit);
                $renderHtml = $this->renderPartial('newCities', array('userDetails' => $userDetails, 'totalCount' => $totalcount), true);
                $obj = array('status' => 'success', 'html' => $renderHtml, 'totalCount' => $totalcount);
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
        } catch (Exception $ex) {
            error_log("######### Exception Occurred##########".$ex->getMessage());
        }
    }
    public function actionChangeCityStatus(){
        try{
            $changeUserStatus = $this->kushGharService->ChangeCityStatus($_POST['Id'], $_POST['status']);
            $obj = array('status' => 'error', 'data' => '', 'error' => $changeUserStatus);
            echo CJSON::encode($obj);
        } catch (Exception $ex) {
            error_log("##### Exception occurred in changing status#####".$ex->getMessage());
        }
    }
    public function actionEditCity(){
        try{            
            $Model = new CitiesForm;
            $getCityDetails=$this->kushGharService->getCityDetails($_POST['Id']);
            error_log("City details========".print_r($getCityDetails, true));
            $renderHtml=  $this->renderPartial('editCity',array("model"=>$Model,"getCityDetails"=>$getCityDetails),true);
            $obj=array('status'=>'success','html'=>$renderHtml);
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {
            error_log("####### Exception Occurred in editing the make ##########".$ex->getMessage());
        }
    }

    public function actionEditCitySave(){
        $EditForm = new CitiesForm();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('CitiesForm');
        if ($formName != '') {
            $EditForm->attributes = $request->getParam('CitiesForm');
            $cityName = $this->kushGharService->checkNewCityExistInCitiesTable($EditForm->CityName);
            if($cityName=='No city'){
                $result = $this->kushGharService->UpdateCity($EditForm);
                $obj = array('status' => 'success', 'data' => $result, 'error' => 'City Name updated successfully.');
            } else{
                $result = 'failure';
                $errors = array("CitiesForm_error" => 'City Name already exists.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }
    
    public function actionLocations(){
        try {
            $this->pageTitle="KushGhar-Settings";
            $cityName=  $this->kushGharService->getCityNameByID($_REQUEST['StateId']);
            $this->render('Locations',array('stateId' => $_REQUEST['StateId'],'CityName'=>$cityName['CityName']));
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########" . $ex->getMessage());
        }
    }
    public function actionNewCity(){
        try{
            $Model = new CitiesForm;
            unset($CityForm);
            $CityForm = new CitiesForm();
            if(isset($_POST['Id'])) $id=$_POST['Id'];
            else $id=-1;
            $States=$this->kushGharService->getStates();
            //$getCityDetails=$this->kushGharService->getCityDetails($id);
            $renderHtml=  $this->renderPartial('newCity',array("model"=>$Model,"States"=>$States),true);
            error_log("bjhbdj-----------------".$renderHtml);
            $obj=array('status'=>'success','html'=>$renderHtml);
            error_log("object---------------".print_r($obj, TRUE));
            $renderScript=  $this->rendering($obj);
            echo $renderScript;
        } catch (Exception $ex) {

        }
    }
    
    public function actionNewCitySave(){
        $newCityForm = new CitiesForm();
        $request = yii::app()->getRequest();
        $formName = $request->getParam('CitiesForm');
        if ($formName != '') {
            $newCityForm->attributes = $request->getParam('CitiesForm');
            error_log("new city----------".print_r($newCityForm, TRUE));
            //$makename=  $this->kushGharService->getMakeNameByID($newCityForm->makeId);
            $modelName = $this->kushGharService->checkNewCityExistInCitiesTableByState($newCityForm->CityName,$newCityForm->StateId);
            if($modelName=='No city'){
                    $result=  $this->kushGharService->newCityAdd($newCityForm->CityName,$newCityForm->StateId);
                $obj = array('status' => 'success', 'data' => $result, 'error' => 'City Added successfully.');
            } else{
                $result = 'failure';
                $errors = array("CitiesForm_error" => 'City already exists.');
                $obj = array('status' => 'error', 'data' => '', 'error' => $errors);
            }
        }
        $renderScript = $this->rendering($obj);
        echo $renderScript;
    }
}