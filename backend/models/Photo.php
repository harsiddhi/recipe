<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $photo_name
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_name'], 'required'],
            [['photo_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_name' => 'Photo Name',
        ];
    }
}
