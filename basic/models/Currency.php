<?php

namespace app\models;

class Currency extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%currencies}}';
    }

    public function rules()
    {
        return [
            [['name', 'short_name', 'k'], 'required'],
            [['k'], 'number'],
        ];
    }
}
