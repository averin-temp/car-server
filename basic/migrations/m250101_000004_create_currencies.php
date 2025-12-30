<?php
use yii\db\Migration;

class m250101_000004_create_currencies extends Migration
{
    public function safeUp()
    {
        $this->createTable('currencies', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'short_name' => $this->string(10)->notNull(),
            'k' => $this->decimal(10,4)->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('currencies');
    }
}

