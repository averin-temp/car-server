<?php
namespace app\models;

class Car extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%car}}';
    }

    public function rules()
    {
        return [
            [['image'], 'string'],
        ];
    }
}
