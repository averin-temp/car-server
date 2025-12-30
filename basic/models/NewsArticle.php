<?php

namespace app\models;


class NewsArticle extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%news}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['content'], 'string'],
        ];
    }
}
