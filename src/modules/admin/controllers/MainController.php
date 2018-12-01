<?php

namespace app\modules\admin\controllers;

use nullref\fulladmin\filters\AccessControl;
use nullref\fulladmin\controllers\MainController as BaseMainController;
use Yii;
use yii\filters\AccessRule;

class MainController extends BaseMainController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class'      => AccessControl::class,
                'only'       => ['logout', 'login', 'index', 'error', 'warning'],
                'rules'      => [
                    [
                        'actions' => ['error'],
                        'roles'   => ['?', '@'],
                    ],
                    [
                        'actions' => ['login', 'warning'],
                        'allow'   => true,
                        'roles'   => ['?', '@'],
                    ],
                    [
                        'class'   => AccessRule::class,
                        'actions' => ['index', 'logout'],
                        'allow'   => true,
                    ],
                ],
            ],
        ];
    }

    public function actionWarning()
    {
        $this->layout = 'main-empty';

        return $this->render('warning');
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/login']);
        }

        return parent::actionIndex();
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/user/login']);
        } else {
            return $this->redirect(['/admin/main']);
        }
    }
}