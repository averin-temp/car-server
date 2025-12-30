<?php


use yii\db\Migration;

class m251230_000000_create_table_car_session extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%car_session}}', [
            'id'      => $this->primaryKey(),
            'car_id'  => $this->integer()->null(),
            'start'   => $this->timestamp()->null(),
            'end'     => $this->timestamp()->null(),
        ]);

        $this->addForeignKey(
            'fk_car_session_car',
            '{{%car_session}}',
            'car_id',
            '{{%car}}',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_car_session_car', '{{%car_session}}');
        $this->dropTable('{{%car_session}}');
    }
}
