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

    public function getCars()
    {
        return $this->hasMany(Car::class, ['location_id' => 'id']);
    }
}
