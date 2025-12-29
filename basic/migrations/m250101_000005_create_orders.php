<?php

use yii\db\Migration;

class m250101_000005_create_orders extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'method_id' => $this->integer(),
            'sum' => $this->decimal(10,2)->notNull(),
            'payed' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_orders_user', '{{%orders}}', 'user_id', '{{%users}}', 'id');
        $this->addForeignKey('fk_orders_currency', '{{%orders}}', 'currency_id', '{{%currencies}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_orders_user', '{{%orders}}');
        $this->dropForeignKey('fk_orders_currency', '{{%orders}}');
        $this->dropTable('{{%orders}}');
    }
}
