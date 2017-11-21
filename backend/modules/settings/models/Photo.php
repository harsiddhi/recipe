<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $p_name
 * @property string $p_photo
 * @property integer $p_id
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;
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
            [['p_name', 'p_photo', 'p_id'], 'required'],
            [['p_id'], 'integer'],
            [['file'],'file'],
            //print_r($temp[]);
            [['p_name'], 'string', 'max' => 20],
            [['p_photo'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'p_name' => 'P Name',
            'p_photo' => 'P Photo',
            'p_id' => 'P ID',
            'p_photo'=>'Image',
        ];
    }
  /*  public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }*/

  /*  public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->p_photo as $file) {
                var_dump($file);
                die();
               // $file->saveAs('../../../web/upload' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }*/


}
