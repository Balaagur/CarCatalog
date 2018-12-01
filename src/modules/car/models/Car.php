<?php

namespace app\modules\car\models;

use Yii;

/**
 * This is the model class for table "{{%car}}".
 *
 * @property int $id
 * @property string $model
 * @property string $photo
 * @property string $photos
 * @property string $description
 * @property int $vendor_id
 * @property int $category_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 * @property Vendor $vendor
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%car}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photos', 'description'], 'string'],
            [['vendor_id', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['model', 'photo'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['vendor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('car', 'ID'),
            'model' => Yii::t('car', 'Model'),
            'photo' => Yii::t('car', 'Photo'),
            'photos' => Yii::t('car', 'Photos'),
            'description' => Yii::t('car', 'Description'),
            'vendor_id' => Yii::t('car', 'Vendor ID'),
            'category_id' => Yii::t('car', 'Category ID'),
            'created_at' => Yii::t('car', 'Created At'),
            'updated_at' => Yii::t('car', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }
}
