<?php

use yii\db\Migration;


class m250101_000002_create_wallets extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%wallets}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'sum' => $this->decimal(10,2)->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk_wallets_user',
            '{{%wallets}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_wallets_user', '{{%wallets}}');
        $this->dropTable('{{%wallets}}');
    }
}
