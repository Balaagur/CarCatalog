<?php

use app\modules\car\models\Car;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var $model Car
 */

$this->title = $model->model;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-view">
    <div class="row">
        <div class="col-lg-8">
            <?= Html::img($model->photo, [
                'class' => 'car-photo',
                'alt'   => $model->model,
                'style' => '
                    width: 400px;
                    display: table;
                    margin: auto;
                ',
            ]) ?>
        </div>
        <div class="col-lg-4">
            <div class="model-name">
                <?= Yii::t('car', 'Model') ?> : <b><?= $model->model ?></b>
            </div>
            <div class="model-vendor">
                <?= Yii::t('car', 'Vendor') ?>: <b><?= $model->vendor->title ?></b>
            </div>
            <div class="model-category">
                <?= Yii::t('car', 'Category') ?>: <b><?= $model->category->title ?></b>
            </div>
            <h5>
                <?= Yii::t('car', 'Photos') ?>
            </h5>
            <div class="photos">
                <?php foreach ($model->photos as $photo): ?>
                    <?= Html::img($photo['url'], [
                        'class' => 'car-photo',
                        'style' => '
                    width: 100px;
                    display: inline-block;
                    border: 1px solid black;
                ',
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-12">
            <?= $model->description ?>
        </div>
    </div>
</div>
