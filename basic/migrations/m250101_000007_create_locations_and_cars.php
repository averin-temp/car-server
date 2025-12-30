<?php
use yii\db\Migration;

class m250101_000007_create_locations_and_cars extends Migration
{
    public function safeUp()
    {
        $this->createTable('locations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
        ]);

        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'location_id' => $this->integer(),
            'state' => $this->integer(),
            'session_id' => $this->integer(),
        ]);

        $this->createTable('car_session', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer(),
            'start' => $this->timestamp(),
            'end' => $this->timestamp(),
            'active' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('car_session');
        $this->dropTable('car');
        $this->dropTable('locations');
    }
}
