<?php

use app\modules\car\models\CarFrontSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var $this View
 * @var $searchModel CarFrontSearch
 * @var $dataProvider ActiveDataProvider
 * @var $vendors array
 * @var $categories array
 */

$this->title = Yii::t('car', 'Cars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <div class="row">
        <div class="col-lg-12">
            <?php Pjax::begin(); ?>

            <?php echo $this->render('_search', [
                'model'      => $searchModel,
                'vendors'    => $vendors,
                'categories' => $categories,
            ]); ?>

            <div class="car-list row">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'summary'      => false,
                    'itemView'     => '_car-item',
                ]); ?>
            </div>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>
