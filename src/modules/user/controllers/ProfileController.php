<?php

namespace app\modules\user\controllers;

use nullref\fulladmin\filters\AccessControl;
use dektrium\user\controllers\ProfileController as BaseProfileController;
use yii\filters\VerbFilter;

class ProfileController extends BaseProfileController
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