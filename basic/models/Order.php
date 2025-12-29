<?php

namespace app\models;


class Order extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'currency_id', 'sum', 'created_at'], 'required'],
            [['user_id', 'currency_id', 'method_id', 'created_at'], 'integer'],
            [['sum'], 'number'],
            [['payed'], 'boolean'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }
}
