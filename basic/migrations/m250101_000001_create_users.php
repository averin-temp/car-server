<?php

use yii\db\Migration;


class m250101_000001_create_users extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'level' => $this->integer()->defaultValue(1),
            'is_active' => $this->boolean()->defaultValue(false),
            'created_at' => $this->dateTime()->defaultExpression("CURRENT_TIMESTAMP"),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
