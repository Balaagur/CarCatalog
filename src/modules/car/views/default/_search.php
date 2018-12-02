<?php

use app\modules\car\models\CarFrontSearch;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var $this View
 * @var $model CarFrontSearch
 * @var $form ActiveForm
 * @var $vendors array
 * @var $categories array
 */
?>

<div class="car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <?= $form->field($model, 'model') ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <?= $form->field($model, 'vendors')->widget(Select2::class, [
                'data'    => $vendors,
                'options' => [
                    'id'       => 'vendorId',
                    'multiple' => true,
                ],
            ])->label(Yii::t('car', 'Vendor')) ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <?= $form->field($model, 'categories')->widget(Select2::class, [
                'data'    => $categories,
                'options' => [
                    'id'       => 'categoryId',
                    'multiple' => true,
                ],
            ])->label(Yii::t('car', 'Category')) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('car', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('car', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
