<?php
use yii\db\Migration;

class m250101_000003_create_wallet_transactions extends Migration
{
    public function safeUp()
    {
        $this->createTable('wallet_transactions', [
            'id' => $this->primaryKey(),
            'wallet_id' => $this->integer()->notNull(),
            'sum' => $this->decimal(10,2)->notNull(),
            'type' => $this->tinyInteger()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_wallet_transactions_wallet',
            'wallet_transactions',
            'wallet_id',
            'wallets',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('wallet_transactions');
    }
}
