<?php

return array_merge(require(__DIR__ . '/installed_modules.php'), [
    'core' => [
        'class' => 'nullref\core\Module',
    ],
    'admin'   => [
        'class' => 'app\modules\admin\Module',
        'controllerMap' => [
            'main' => [
                'class' => 'app\modules\admin\controllers\MainController',
            ]
        ],
        'components' => [
            'menuBuilder' => 'app\modules\admin\components\AdminMenuBuilder',
        ],
    ],
    'user'    => [
        'class'         => 'app\modules\user\Module',
        'layout'        => '@app/modules/admin/views/layouts/main',
        'controllerMap' => [
            'admin'        => [
                'class' => 'app\modules\user\controllers\AdminController',
            ],
            'profile'      => [
                'class' => 'app\modules\user\controllers\ProfileController',
            ],
            'recovery'     => [
                'class' => 'app\modules\user\controllers\RecoveryController',
            ],
            'registration' => [
                'class' => 'app\modules\user\controllers\RegistrationController',
            ],
            'security'     => [
                'class' => 'app\modules\user\controllers\SecurityController',
            ],
            'settings'     => [
                'class' => 'app\modules\user\controllers\SettingsController',
            ],
        ],
    ],
]);