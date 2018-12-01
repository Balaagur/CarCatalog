<?php

namespace app\helpers;

use Yii;

class FileInputHelper
{
    public static function getInputFileOptions($options = [])
    {
        $defaults = [
            'buttonName' => Yii::t('app', 'Browse'),
            'language' => 'ru',
            'controller' => 'elfinder',
            'filter' => 'image',
            'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
            'options' => ['class' => 'form-control'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple' => false
        ];

        return array_merge($defaults, $options);
    }
}