<?php

$params = require(__DIR__ . '/params.php');
$modules = require(__DIR__ . '/modules.php');

$config = [
    'id'            => 'app',
    'name'          => 'Каталог автомобілів',
    'language'      => 'uk',
    'basePath'      => dirname(__DIR__),
    'vendorPath'    => dirname(dirname(__DIR__)) . '/vendor',
    'runtimePath'   => dirname(dirname(__DIR__)) . '/runtime',
    'bootstrap'     => ['log'],
    'aliases'       => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'    => [
        'formatter'    => [
            'class' => 'app\components\Formatter',
        ],
        'request'      => [
            'enableCookieValidation' => true,
            'cookieValidationKey'    => 'RiAveGUdUACvWZppHVevMJRGd5Rij8uh',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            'useFileTransport' => YII_ENV_DEV,
        ],
        'i18n'         => [
            'translations' => [
                '*' => ['class' => 'yii\i18n\PhpMessageSource'],
            ],
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
        ],
        'db'           => require(__DIR__ . '/db.php'),
    ],
    'controllerMap' => [
        'elfinder' => [
            'class'  => 'mihaildev\elfinder\Controller',
            'user'   => 'user',
            'access' => ['@'],
            'roots'  => [
                [
                    'path' => 'files',
                    'name' => 'Files',
                ],
            ],
        ],
    ],
    'modules'       => $modules,
    'params'        => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';

    $config['components']['mailer'] = [
        'class'            => 'yii\swiftmailer\Mailer',
        'useFileTransport' => YII_MAIL_USE_FILE_TRANSPORT,
    ];
} else {
    $config['components']['mailer'] = [
        'class'            => 'yii\swiftmailer\Mailer',
        'viewPath'         => '@app/modules/user/views/mail',
        'transport'        => [
            'class'      => 'Swift_SmtpTransport',
            'host'       => 'smtp.gmail.com',
            'username'   => $params['mailer']['username'],
            'password'   => $params['mailer']['password'],
            'port'       => '465',
            'encryption' => 'ssl',
            'plugins'    => [
                [
                    'class'         => 'Swift_Plugins_LoggerPlugin',
                    'constructArgs' => [new Swift_Plugins_Loggers_ArrayLogger],
                ],
            ],
        ],
        'useFileTransport' => false,
    ];
}

return $config;
