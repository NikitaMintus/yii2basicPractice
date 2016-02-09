<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "postsEasy".
 *
 * @property integer $post_id
 * @property string $post_title
 * @property string $post_description
 * @property integer $author_id
 *
 * @property Users $author
 */
class PostsEasy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postsEasy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_title', 'post_description', 'author_id'], 'required'],
            [['author_id'], 'integer'],
            [['post_title'], 'string', 'max' => 150],
            [['post_description'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'post_title' => 'Post Title',
            'post_description' => 'Post Description',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'author_id']);
    }
}
