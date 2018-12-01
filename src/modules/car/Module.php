<?php

namespace app\modules\car;

use nullref\fulladmin\Module as BaseModule;
use rmrevin\yii\fontawesome\FA;
use Yii;

/**
 * car module definition class
 */
class Module extends BaseModule
{
    public $controllerNamespace = 'app\modules\car\controllers';

    public static function getAdminMenu()
    {
        return [
            'label' => Yii::t('admin', 'Car catalog'),
            'icon'  => FA::_TASKS,
            'items' => [
                [
                    'label' => Yii::t('admin', 'Cars'),
                    'url'   => ['/car/admin/car'],
                    'icon'  => FA::_CAR,
                ],
                [
                    'label' => Yii::t('admin', 'Vendors'),
                    'url'   => ['/car/admin/vendor'],
                    'icon'  => FA::_LIST,
                ],
                [
                    'label' => Yii::t('admin', 'Category'),
                    'url'   => ['/car/admin/category'],
                    'icon'  => FA::_LIST,
                ],
            ],
        ];
    }
}
