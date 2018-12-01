<?php

namespace app\modules\user\controllers;

use nullref\fulladmin\filters\AccessControl;
use dektrium\user\controllers\RecoveryController as BaseRecoveryController;
use yii\filters\VerbFilter;

class RecoveryController extends BaseRecoveryController
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