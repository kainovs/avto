<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'СУПЕР ТАЧКИ - автообъявления',
        'theme'=>'bootstrap',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                'ext.imagecolumn.EImageColumn',
	),
        'defaultController'=>'Ads',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                                'bootstrap.gii'),
		),
                'user' => array( 
                         'tableUsers' => 'tbl_users', 
                         'tableProfiles' => 'tbl_profiles', 
                         'tableProfileFields' => 'tbl_profiles_fields', 
                    ),
            		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'loginUrl'=> '/user/login',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
                      'showScriptName'=> false,	
                      'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
                'ih'=>array('class'=>'CImageHandler'),
                'bootstrap'=>array(
                'class'=>'bootstrap.components.Bootstrap',),
		
            /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
             		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=avtodb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'atyz',
			'charset' => 'utf8',
                        'tablePrefix' => 'tbl_',
                        'enableProfiling'=>true,
                        'enableParamLogging' => true,
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
					'levels'=>'error, warning',
                                    
				),
                                array(
                        'class'=>'ext.db_profiler.DbProfileLogRoute',
                        'countLimit' => 1, // How many times the same query should be executed to be considered inefficient
                        'slowQueryMin' => 0.01, // Minimum time for the query to be slow
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
    
        'sourceLanguage'=>'en_US',
            'language'=>'ru',
            'charset'=>'utf-8',

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);