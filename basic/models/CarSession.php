<?php

namespace app\models;


/**
 *
 * @property int $id
 * @property int $car_id
 * @property int $user_id
 * @property int $start
 * @property int $end
 * @property int $active
 */
class CarSession extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%car_session}}';
    }

    public function rules()
    {
        return [
        ];
    }

    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
