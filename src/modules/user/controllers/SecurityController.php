<?php

namespace app\modules\user\controllers;

use nullref\fulladmin\filters\AccessControl;
use dektrium\user\controllers\SecurityController as BaseSecurityController;
use yii\filters\VerbFilter;

class SecurityController extends BaseSecurityController
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

    /**
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = '@app/modules/admin/views/layouts/base.php';
        return parent::actionLogin();
    }
}