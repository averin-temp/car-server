<?php
use yii\db\Migration;

class m250101_000007_create_locations_and_cars extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%locations}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
        ]);

        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
        ]);

        $this->createTable('{{%location_car}}', [
            'id' => $this->primaryKey(),
            'location_id' => $this->integer()->notNull(),
            'car_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_lc_location', '{{%location_car}}', 'location_id', '{{%locations}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_lc_car', '{{%location_car}}', 'car_id', '{{%car}}', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%location_car}}');
        $this->dropTable('{{%car}}');
        $this->dropTable('{{%locations}}');
    }
}
