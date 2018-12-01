<?php

use nullref\fulladmin\widgets\Flash;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $exception Exception
 */

$this->title = Yii::t('app','Warning');
?>
<div class="site-error">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <?= Flash::widget() ?>

</div>
