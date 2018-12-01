<?php

namespace app\modules\user\controllers;

use nullref\fulladmin\filters\AccessControl;
use dektrium\user\controllers\RegistrationController as BaseRegistrationController;
use yii\filters\VerbFilter;

class RegistrationController extends BaseRegistrationController
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