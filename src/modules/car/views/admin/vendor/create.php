<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\car\models\Vendor */

$this->title = Yii::t('car', 'Create Vendor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('car', 'Vendors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-create">

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
