<?php

use app\helpers\FileInputHelper;
use mihaildev\elfinder\ElFinder;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\car\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

            <?=
            $form->field($model, 'vendor_id')
                ->dropDownList(\app\modules\car\models\Vendor::getDropDownArray('id', 'title'), [
                    'prompt' => Yii::t('car', 'Choose vendor')
                ])
                ->label(Yii::t('car', 'Vendor'))
            ?>

            <?=
            $form->field($model, 'category_id')
                ->dropDownList(\app\modules\car\models\Category::getDropDownArray('id', 'title'), [
                        'prompt' => Yii::t('car', 'Choose category')
                ])
                ->label(Yii::t('car', 'Category'))
            ?>

            <?= $form->field($model, 'photo')->widget(InputFile::class, FileInputHelper::getInputFileOptions()) ?>

            <?= $form->field($model, 'photos')->widget(MultipleInput::class, [
                'columns'           => [
                    [
                        'name'    => 'url',
                        'type'    => InputFile::class,
                        'options' => FileInputHelper::getInputFileOptions(),
                        'class'   => MultipleInputColumn::class,
                    ],
                    [
                        'name' => 'helper',
                        'type' => 'hiddenInput',
                    ],
                ],
                'allowEmptyList'    => false,
                'enableGuessTitle'  => false,
                'addButtonPosition' => MultipleInput::POS_ROW,
            ]);
            ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'description')->widget(CKEditor::class, [
                'editorOptions' => array_merge(
                    [
                        'preset' => 'full',
                    ],
                    ElFinder::ckeditorOptions('elfinder')
                )
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('car', 'Create') : Yii::t('car', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
