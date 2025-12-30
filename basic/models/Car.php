<?php
namespace app\models;

/**
 *
 * Машинка
 *
 * @property int $id
 * @property string $image
 * @property int $location_id
 * @property int $state
 * @property Location $location
 */
class Car extends \yii\db\ActiveRecord
{
    const STATE_FREE     = 0; // свободна
    const STATE_BUSY     = 1; // занята пользователем


    public static function tableName()
    {
        return '{{%car}}';
    }

    public function rules()
    {
        return [
            [['image'], 'string'],
            [['location_id'], 'required'],
            [['state'], 'required'],
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(Location::class, ['id' => 'location_id']);
    }
}
