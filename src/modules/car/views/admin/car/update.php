<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car\models\Car */

$this->title = Yii::t('car', 'Update {modelClass}: ', [
    'modelClass' => 'Car',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('car', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('car', 'Update');
?>
<div class="car-update">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>

    <p>
        <?= Html::a(Yii::t('car', 'List'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
