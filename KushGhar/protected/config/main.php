<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'KushGhar',
        'defaultController' => 'site',

	

	// autoloading model and component classes
	'import' => array(
        'application.models.*',
        'application.models.mysql.*',
        'application.components.*',
        'application.extensions.*',
        'application.service.*',
        'application.renderscript.*',        
        'application.beans.*',
         
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),
             'controllerMap'=>array(
     'YiiFeedWidget' => 'ext.yii-feed-widget.YiiFeedWidgetController'
),
  

	// application components
	'components'=>array(
            'simpleImage'=>array(
                        'class' => 'application.extensions.simpleImage.CSimpleImage',
                ),
             // uncomment the following to use a MySQL database
		'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
    'modules'=>array(
        'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),
          
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                    'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
                    //'urlSuffix'=>'.html',

		),
		

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=10.10.73.111;dbname=Kushghar',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'techo2',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				      array(
                'class'=>'CFileLogRoute',
                'levels'=>'error,warning',
                'categories'=>"system.*",
                'logFile'=>'mailError.log'.date('d-m-y'),
            ),

			),
                
		),
            'mail'=>array(
                        'class' => 'application.extensions.mail.Mail',
                ),
      
            ),
// application-level parameters that can be accessed
	
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
            'SERVER_URL'=>'http://10.10.73.107:6060',
            'ADDITIONAL_SERVICE_COST'=>250,
	),
);
