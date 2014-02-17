<?php

class SiteController extends Controller
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
		$this->render('index');
	}
        public function actionAboutus(){
        $aboutus = "praveen========";
        $this->render("aboutus",array("aboutus"=>$aboutus));
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{       error_log("enter contact form action in controller=========");
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{

                            $result = $this->kushGharService->saveAdminContact($model);
                error_log("result============".$result);
                if($result=="success"){
                    $mess = 'Thank you for contacting us. We will respond to you as soon as possible';
                }else{
                    $mess ='Already User Existed';
                }
				Yii::app()->user->setFlash('contact',$mess);
				$this->refresh();
                                
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
	
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        /**
	 * Displays the contact page
	 */
	public function actionSample()
	{       error_log("enter Sample form action in controller=========");
		$model=new SampleForm;
		if(isset($_POST['SampleForm']))
		{
			$model->attributes=$_POST['SampleForm'];
			if($model->validate())
			{

                            //$result = $this->kushGharService->saveAdminContact($model);
                //error_log("result============".$result);
                $result="success";
                            if($result=="success"){
                                            $mess = 'Thank you for contacting us. We will respond to you as soon as possible';
                }else{
                    $mess ='Already User Existed';
                }
				Yii::app()->user->setFlash('sample',$mess);
				$this->refresh();

			}
		}
		$this->render('contact',array('model'=>$model));
	}
  
}