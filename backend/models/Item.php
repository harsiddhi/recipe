<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $item_id
 * @property string $item_name
 * @property string $item_description
 * @property string $item_process
 * @property string $item_photo
 * @property integer $categoty_id
 *
 * @property Gellary[] $gellaries
 * @property Ingredients[] $ingredients
 * @property Category $categoty
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc

     */

    public $file;
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'item_description', 'item_process', 'item_photo', 'categoty_id'], 'required'],
            [['item_description', 'item_process'], 'string'],
            [['categoty_id'], 'integer'],
            [['item_name'], 'string', 'max' => 30],
            [['item_photo'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_name' => 'Item Name',
            'item_description' => 'Item Description',
            'item_process' => 'Item Process',
            'item_photo' => 'Item Photo',
            'categoty_id' => 'Categoty ID',
            'file'=>'Item Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGellaries()
    {
        return $this->hasMany(Gellary::className(), ['item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredients::className(), ['item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoty()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'categoty_id']);
    }
}
