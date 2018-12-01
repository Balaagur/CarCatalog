<?php

namespace app\modules\car\models;

use Yii;

/**
 * This is the model class for table "{{%vendor}}".
 *
 * @property int $id
 * @property string $title
 * @property string $country
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Car[] $cars
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vendor}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'country'], 'string', 'max' => 255],
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
            'country' => Yii::t('car', 'Country'),
            'created_at' => Yii::t('car', 'Created At'),
            'updated_at' => Yii::t('car', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['vendor_id' => 'id']);
    }
}
