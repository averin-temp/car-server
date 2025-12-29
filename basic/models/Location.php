<?php

namespace app\models;


class Location extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%locations}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['image'], 'string'],
        ];
    }
}
