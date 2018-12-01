<?php

namespace app\modules\admin;

use nullref\fulladmin\Module as BaseModule;
use nullref\core\interfaces\IHasMigrateNamespace;
use Yii;

/**
 * admin module definition class
 */
class Module extends BaseModule implements IHasMigrateNamespace
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public static function getAdminMenu()
    {
        return [
            'label' => Yii::t('admin', 'Dashboard'),
            'url' => ['/admin/main'],
            'icon' => 'dashboard',
            'order' => 1,
            'roles' => ['dashboard'],
        ];
    }

    public function getMigrationNamespaces($defaults)
    {
        return [
            'nullref\fulladmin\modules\user\migrations',
            'nullref\fulladmin\migrations',
        ];
    }
}
