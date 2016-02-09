<?php

namespace app\modules\blog\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $text_preview
 * @property string $img
 */
class Posts extends ActiveRecord
{
    public $image;
    public $filename;
    public $string;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'text_preview'], 'required'],
            [['title'], 'string', 'max' => 150],
            [['text'], 'string', 'max' => 500],
            [['text_preview'], 'string', 'max' => 250],
//            [['img'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'text_preview' => 'Text Preview',
            //'img' => 'Img',
        ];
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord) {
            $this->string = substr(uniqid('img'), 0, 12);
            $this->image = UploadedFile::getInstance($this, 'img');
            $this->filename = 'static/images/' . $this->string . '.' . $this->image->extension;
            $this->image->saveAs($this->filename);
            $this->img = '/' . $this->filename;
        } else {
            $this->img = UploadedFile::getInstance($this, 'images');
            if($this->img) {
                $this->img->saveAs(substr($this->img, 1));
            } else {
//                $this->string = substr(uniqid('img'), 0, 12);
//                $this->image = UploadedFile::getInstance($this, 'img');
//                $this->filename = 'static/images/' . $this->string . '.' . $this->image->extension;
//                $this->image->saveAs($this->filename);
//                $this->img = '/' . $this->filename;
            }


        }
        return parent::beforeSave($insert);
    }
}
