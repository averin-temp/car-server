<?php

namespace app\models;


class WalletTransaction extends \yii\db\ActiveRecord
{
    const TYPE_INCOME  = 1;
    const TYPE_EXPENSE = 2;

    public static function tableName()
    {
        return '{{%wallet_transactions}}';
    }

    public function rules()
    {
        return [
            [['wallet_id', 'sum', 'type', 'created_at'], 'required'],
            [['wallet_id', 'type', 'created_at'], 'integer'],
            [['sum'], 'number'],
            ['type', 'in', 'range' => [self::TYPE_INCOME, self::TYPE_EXPENSE]],
        ];
    }

    public function getWallet()
    {
        return $this->hasOne(Wallet::class, ['id' => 'wallet_id']);
    }
}
