<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'carSessionManager' => [
            'class' => 'app\components\CarSessionManager',
        ],
        'authService' => [
            'class' => 'app\components\AuthService',
            'jwtExpire' => 3600,
            'jwtSecret' => 's3R9xV2kP8qL7JwM5eFhC0ZrT4D1bA6Y', // мин 32 символа
            'jwtAlg' => 'HS256',
            'minPasswordLength' => 8,
        ],
        'request' => [
            'cookieValidationKey' => 'Jl0M-pQ6FKtdBwkZvmw7EbivVfGUERjZ',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],

        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'formatters' => [
                yii\web\Response::FORMAT_JSON => [
                    'class' => app\components\ApiResponseFormatter::class,
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/auth/token' => 'auth/token',
                '/users/register' => 'users/register',
                '/users/list' => 'users/list',
                '/cars/list' => 'cars/list',
                '/locations/list' => 'locations/list',
                '/session/start' => 'session/start',
                '/session/stop' => 'session/stop',
                '/achievements/list' => 'achievements/list',
                '/news/list' => 'news/list',
            ],
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
