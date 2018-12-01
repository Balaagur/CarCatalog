<?php

namespace app\modules\user\controllers;

use nullref\fulladmin\filters\AccessControl;
use dektrium\user\controllers\SettingsController as BaseSettingsController;
use yii\filters\VerbFilter;

class SettingsController extends BaseSettingsController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}