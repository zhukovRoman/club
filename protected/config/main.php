<?php
$arrDBdebug = array(
            'connectionString' => 'mysql:host=localhost;dbname=baa',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        );
$arrDBserver = array(
            'connectionString' => 'mysql:host=localhost;dbname=user2097_club',
            'emulatePrepare' => true,
            'username' => 'user2097_club',
            'password' => '7dkvne',
            'charset' => 'utf8',
        );
$db = (0)? $arrDBserver :$arrDBdebug;
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'BAA',
    //'emailAdmin'=>'zhrovl@gmail.com',
    // preloading 'log' component

    'preload' => array('log',
        'bootstrap'),
    'sourceLanguage' => 'ru_Ru',
    'language' => 'ru',
    'charset' => 'utf-8',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.components.CImageHandler',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii', // since 0.9.1
            ),
        ),
    ),
    // application components
    'components' => array(
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => '/js/jquery.js',
                //'bootstrap.js' => '/js/bootstrap.js'
            )
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        // assuming you extracted bootstrap under extensions),
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
        ),
        'ih' => array(
            'class' => 'CImageHandler',
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         *//*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
          // uncomment the following to use a MySQL database
         */
         
        'db' => $db,
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);