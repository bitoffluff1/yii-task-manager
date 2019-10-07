<?php

use app\components\Path;
use app\components\Seo;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'test' => [
            'class' => 'app\modules\test\Module',
        ],
    ],
    'components' => [
        'seo' => [
            'class' => Seo::class, //'app\components\Seo'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Z6EMBBpdWl7jSEh6dTyCDO9elJgC2OOR',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => Swift_SmtpTransport::class,
                'host' => 'smtp.mail.ru',
                'username' => '',
                'password' => '',
                'port' => 993,
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/index',
                '/login' => 'site/login',
                '/logout' => 'site/logout',
                '/signup' => 'site/signup',

                '/activities' => 'activity/index',
                '/calendar' => 'activity/calendar',
                '/day/<day:[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])>' => 'activity/day',
                '/activity/<id:\d+>' => 'activity/view',
                '/activity/update/<id:\d+>' => 'activity/update',
                '/activity/update' => 'activity/update',
                '/activity/delete/<id:\d+>' => 'activity/delete',

                '/users' => 'user/index',
                '/user/<id:\d+>' => 'user/view',
                '/user/profile' => 'user/profile',
                '/user/update/<id:\d+>' => 'user/update',
                '/user/update' => 'user/update',
                '/user/delete/<id:\d+>' => 'user/delete',
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
