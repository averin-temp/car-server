<?php

namespace app\models;


class LocationCar extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%location_car}}';
    }

    public function rules()
    {
        return [
            [['location_id', 'car_id'], 'required'],
            [['location_id', 'car_id'], 'integer'],
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(Location::class, ['id' => 'location_id']);
    }

    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }
}
