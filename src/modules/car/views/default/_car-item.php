<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var $this View
 * @vat $model Car
 */

?>

<div class="car-item col-lg-3 col-md-3 col-sm-4" style="margin-bottom: 5px;">
    <div
            class="car-item"
            style="border: 1px solid black; border-radius: 5px; padding: 5px;">
        <?= Html::a(
            Html::img($model->photo, [
                'class' => 'car-photo',
                'style' => '
            width: 150px; 
            min-height: 100px; 
            display: table; 
            margin: 5px auto; 
            border: 1px solid grey; 
            box-shadow: grey 1px 1px 20px 5px;',
                'alt'   => $model->model,
            ]),
            Url::to(['/car/default/view', 'id' => $model->id]), [
                'class'     => 'title-link',
                'data-pjax' => '0',
            ]
        ) ?>
        <div
                class="car-model text-center"
                style="font-size: 20px; margin-top: 10px;">
            <?= $model->model ?>
        </div>

        <div class="car-vendor">
            <?= Yii::t('car', 'Vendor') ?>: <b><?= $model->vendor->title ?></b>
        </div>

        <div class="car-category">
            <?= Yii::t('car', 'Category') ?>: <b><?= $model->category->title ?></b>
        </div>
    </div>
</div>
