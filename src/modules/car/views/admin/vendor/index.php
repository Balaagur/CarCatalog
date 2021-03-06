<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\car\models\VendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('car', 'Vendors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-index">

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?= Html::encode($this->title) ?>
        </h1>
    </div>
</div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('car', 'Create Vendor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'country',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
