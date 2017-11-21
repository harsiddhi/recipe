<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gellary".
 *
 * @property integer $photo_id
 * @property string $photo_path
 * @property integer $item_id
 *
 * @property Item $item
 */
class Gellary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gellary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_path', 'item_id'], 'required'],
            [['item_id'], 'integer'],
            [['photo_path'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo_id' => 'Photo ID',
            'photo_path' => 'Photo Path',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['item_id' => 'item_id']);
    }
}
