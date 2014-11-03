<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'KushGhar',
    

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import' => array(
        'application.models.*',
        'application.models.mysql.*',
        'application.components.*',
        'application.extensions.*',
        'application.service.*',
        'application.renderscript.*',        
        'application.beans.*',
        //'ext.yii-mail.YiiMailMessage',    
         
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
            
	// application components
	'components'=>array(
            
             'mail' => array(
             'class' => 'ext.yii-mail.YiiMail',
             'viewPath' => 'application.views.mail',
             'logging' => true,
             'dryRun' => false
             ),
        

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
		),
		
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=10.10.73.101;dbname=Kushghar',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'techo2',
			'charset' => 'utf8',
		),
		

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
         
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
         ),
);
