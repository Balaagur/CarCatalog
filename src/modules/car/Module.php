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
            'url'   => ['/admin/main'],
            'icon'  => FA::_TASKS,
            'items' => [
                [
                    'label' => Yii::t('admin', 'Cars'),
                    'url'   => ['/admin/car/car'],
                    'icon'  => FA::_CAR,
                ],
                [
                    'label' => Yii::t('admin', 'Vendors'),
                    'url'   => ['/admin/car/vendor'],
                    'icon'  => FA::_LIST,
                ],
                [
                    'label' => Yii::t('admin', 'Catagories'),
                    'url'   => ['/admin/car/catalog'],
                    'icon'  => FA::_LIST,
                ],
            ],
        ];
    }
}
