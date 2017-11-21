<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_createdat
 * @property string $category_photo
 * @property string $category_updatedat
 *
 * @property Item[] $items
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'category_createdat', 'category_photo', 'category_updatedat'], 'required'],
            [['category_createdat', 'category_updatedat'], 'safe'],
            [['file'],'file'],
            [['category_name'], 'string', 'max' => 30],
            [['category_photo'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category Id',
            'category_name' => 'Category Name',
            'category_createdat' => 'Category Createdat',
            'category_photo' => 'Category Photo',
            'category_updatedat' => 'Category Updatedat',
            'file'=>'Category Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['categoty_id' => 'category_id']);
    }
}
