<?php

namespace app\models;



class Wallet extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%wallets}}';
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['sum'], 'number'],
        ];
    }

    public function getTransactions()
    {
        return $this->hasMany(WalletTransaction::class, ['wallet_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
