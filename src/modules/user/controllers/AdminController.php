<?php

namespace app\modules\user\controllers;

use yii\filters\AccessControl;
use dektrium\user\controllers\AdminController as BaseAdminController;
use yii\filters\VerbFilter;

class AdminController extends BaseAdminController
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