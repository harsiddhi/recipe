<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "story".
 *
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property string $content
 */
class Story extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'story';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'content'], 'required'],
            [['key'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 30],
            [['content'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
