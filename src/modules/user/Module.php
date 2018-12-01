<?php

namespace app\modules\user;

use nullref\fulladmin\modules\user\Module as BaseModule;
use nullref\core\interfaces\IAdminModule;
use rmrevin\yii\fontawesome\FA;

class Module extends BaseModule implements IAdminModule
{
    public $controllerAliases = [
        '@app/modules/user/controllers',
        '@dektrium/user/controllers',
    ];

    public $controllerNamespace = 'app\modules\user\controllers';
    public $viewPath = '@app/modules/user/views';

    public $modelMap = [
        'User' => 'app\modules\user\entities\User',
    ];

    public function init()
    {

    }

    public static function getAdminMenu()
    {
        return [
            'label' => \Yii::t('user', 'Users'),
            'icon' => FA::_USERS,
            'url' => '/user/admin',
            'order' => 5,
        ];
    }

}