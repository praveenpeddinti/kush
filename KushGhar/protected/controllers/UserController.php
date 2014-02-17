<?php

class UserController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{   error_log("________________index______________________________________________");
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = 'layout';
        $this->render('index');
	}
       
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

        //User Registration Form Controller START
        public function actionRegistration() {
            //$this->layout = 'layout';
     
        error_log("enter Registration action in controller=========");
        $this->layout = 'layout';
        $model = new RegistrationForm;
        $request=yii::app()->getRequest();
        $formName=$request->getParam('RegistrationForm');
         if ($formName!='') {error_log("if======");
            $model->attributes = $request->getParam('RegistrationForm');
            $errors=CActiveForm::validate($model);
            error_log("if11======".$model->FirstName);
            if ($errors != '[]')
                {
                    $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
                } else
                    {error_log("else======".$model->FirstName);
                    $result = $this->kushGharService->saveRegistrationData($model);
                    error_log("successcontroll data======".$result);

                    if ($result == "success") {
                    //$mess = 'Thank you for contacting us. We will respond to you as soon as possible';
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                    } else {
                    //$mess = 'Already User Existed';
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                    }
                    
                }
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }
            else{
                 
                 $this->render('registration',array('model'=>$model));
           }
  }
    //User Registration Form Controller END

    ////User BaiscInfo Form Controller END
   public function actionBasicinfo(){
       
       $basicForm = new BasicinfoForm;
       $cId=1;
       $customerDetails = $this->kushGharService->getCustomerDetails($cId);
       $Identity = $this->kushGharService->getIdentifyProof();
       $request=yii::app()->getRequest();
        $formName=$request->getParam('BasicinfoForm');
         if ($formName!='') {error_log("if======");
            $basicForm->attributes = $request->getParam('BasicinfoForm');
            $errors=CActiveForm::validate($basicForm);
            error_log("if11======".$basicForm->Gender);
            if ($errors != '[]')
                {
                    $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
                } else
                    {error_log("else======".$this->session['fileName']);
                    $basicForm->profilePicture = $this->session['fileName'];
                    $result1 = $this->kushGharService->updateRegistrationData($basicForm,$cId);
                    $result = $this->kushGharService->saveCustomerBasicDetails($basicForm,$cId);
                    
                    error_log("successcontroll data======".$result);

                    if ($result == "success") {
                    //$mess = 'Thank you for contacting us. We will respond to you as soon as possible';
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                    } else {
                    //$mess = 'Already User Existed';
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                    }
                    
                }
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }else{
       $this->render('basicinfo', array("model" => $basicForm, "IdentityProof" => $Identity, "customerDetails" => $customerDetails));
            }
   }
  //User BaiscInfo Form Controller END


   ////User contactInfo Form Controller END
   public function actionContactInfo(){

       $ContactInfoForm = new ContactInfoForm;
       $cId=1;
       $customerDetails = $this->kushGharService->getCustomerDetails($cId);
       //$Identity = $this->kushGharService->getIdentifyProof();
       $request=yii::app()->getRequest();
        $formName=$request->getParam('ContactInfoForm');
         if ($formName!='') {error_log("if======");
            $ContactInfoForm->attributes = $request->getParam('ContactInfoForm');
            $errors=CActiveForm::validate($ContactInfoForm);
            error_log("if11======".$ContactInfoForm->Address1);
            if ($errors != '[]')
                {
                    $obj = array('status' => 'error', 'message' => '', 'error' => $errors);
                } else
                    {
                    error_log("if11else======".$ContactInfoForm->Address1);
                    $result1 = $this->kushGharService->updateRegistrationinContactData($ContactInfoForm,$cId);
                    $result = $this->kushGharService->saveCustomerInfoDetails($ContactInfoForm,$cId);

                    error_log("successcontroll data======".$result);

                    if ($result == "success") {
                    //$mess = 'Thank you for contacting us. We will respond to you as soon as possible';
                    $message = Yii::t('translation', 'Thank you for contacting us. We will respond to you as soon as possible');
                    $obj = array('status' => 'success', 'message' => $message, 'error' => '');
                    } else {
                    //$mess = 'Already User Existed';
                    $message = Yii::t('translation', 'Already User Existed');
                    $obj = array('status' => 'error', 'message' => '', 'error' => $message);
                    }

                }
                $renderScript = $this->rendering($obj);
                echo $renderScript;
            }else{
       $this->render('contactInfo', array("model" => $ContactInfoForm, "customerDetails" => $customerDetails));
            }
   }
  //User ContactInfo Form Controller END


        public function actionSample() {
        error_log("enter Sample form action in controller=========");
        
        $model = new SampleForm;
        $result = "failure";
        if (isset($_POST['SampleForm'])) {
            $model->attributes = $_POST['SampleForm'];
            if ($model->validate()) {
                if($model->Id!=''){error_log("====OlduserId===".$model->Id);
                  

                   $result = $this->kushGharService->updateSampleData($model);

                   
                }else{error_log("====NewuserId===".$model->Id);
                    $result = $this->kushGharService->saveSampleData($model);
                   
                }


              //
              error_log("result============".$result);
              //$result = "success";
              if ($result == "success") {
                  $mess = 'Thank you for contacting us. We will respond to you as soon as possible';
              } else {
                  $mess = 'Already User Existed';
              }
              Yii::app()->user->setFlash('sample', $mess);
              //$this->refresh();
            }
                $result = $this->kushGharService->userDetails();
                $this->render('edit', array("details" => $result, "mess"=>$mess));
        }else{
        $this->render('sample', array('model' => $model));
    }
    //$this->render('sample', array('model' => $model));
    }

    public function actionAboutus(){
        $this->layout = 'content';
        //$result = $this->kushGharService->aboutUsDetails();
        $this->render('aboutus');
    }
    public function actionPrivacyPolicy(){
        //$model = new AboutusForm();
        $this->layout = 'content';
        $this->render('privacyPolicy');
    }
    public function actionTermsofService(){
        //$model = new AboutusForm();
        $this->layout = 'content';
        $this->render('termsofService');
    }

    public function actionEditById(){
        error_log("id==con==".$_REQUEST['id']);
        if(isset($_REQUEST['id'])&& $id = $_REQUEST['id']){

            $sampleModel = new SampleForm();
            $res = $this->kushGharService->getUserDetails($_REQUEST['id']);
            $sampleModel->Id = $res->Id;
            $sampleModel->SNo = $res->Sno;
            $sampleModel->SName = $res->sname;
            $sampleModel->CName = $res->cname;
            $sampleModel->Address = $res->Address;
            


            $this->render('sample',array("model"=>$sampleModel));
        }
    }

    public function actionEdit(){
        $result = $this->kushGharService->userDetails();
        $this->render('edit', array("details" => $result));
    }

public function actionFileUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder = $this->findUploadedPath() . '/images/profile/'; // folder for uploaded files
        error_log("folder========".$folder."====");
        $allowedExtensions = array("jpg", "jpeg", "gif", "png"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 15 * 1024 * 1024; // maximum file size in bytes

        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        error_log("folder======qqFileUploader==".$sizeLimit);
        $result = $uploader->handleUpload($folder);
         error_log("folder======handler==".$sizeLimit);
        $return = CJSON::encode($result);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        error_log("folder======handler33333333333==".$sizeLimit);
        $fileName = $result['filename']; //GETTING FILE NAME
        error_log("folder======handler==ssssssssssssss".$sizeLimit);
        $imgArr = explode(".", $fileName);
        error_log("folder======handler=dddddddddddddd=".$sizeLimit);
//        $filename .= rand(10, 99);
        error_log("folder======handler=random===".$sizeLimit);
        $finalImg_name = $result['filename'];
        error_log("folder======filename==".$finalImg_name);
        // creating small image from the Big one...

        try {
            $finalImg_name_new = $this->findUploadedPath() . '/images/profile/' . $finalImg_name;
            $dest = str_replace(' ', '', $finalImg_name_new);
            $_SESSION['oldfilename'] = $finalImg_name_new;
            $img = Yii::app()->simpleImage->load($folder . $result['filename']); // load file from the specified the path...
            $img->resizeToHeight(50); // creating image height to 50...
            $img->save($finalImg_name_new); // saving into the specified path...
            $finalImg_name = '/images/profile/' . $finalImg_name;
            $this->session['fileName'] = $finalImg_name;
            error_log("ffdsfsdd----".$this->session['fileName']);
        } catch (Exception $e) {
            error_log("***********************" . $e->getMessage());
        }
        echo $return; // it's array
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
            error_log("--------------".$originalPath);
        } catch (Exception $ex) {
            error_log("#########Exception Occurred########$ex->getMessage()");
        }
        return $originalPath;
 }


  
}
