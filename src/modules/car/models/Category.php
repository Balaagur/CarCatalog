<?php

namespace app\modules\car\models;

use nullref\useful\DropDownTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string title
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Car[] $cars
 */
class Category extends ActiveRecord
{
    use DropDownTrait;

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'datetime' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('car', 'ID'),
            'title' => Yii::t('car', 'Title'),
            'created_at' => Yii::t('car', 'Created At'),
            'updated_at' => Yii::t('car', 'Updated At'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['category_id' => 'id']);
    }
}
