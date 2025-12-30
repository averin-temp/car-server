<?php
use yii\db\Migration;

class m250101_000006_create_achievements extends Migration
{
    public function safeUp()
    {
        $this->createTable('achievements', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'icon' => $this->string(),
        ]);

        $this->createTable('achievement_rules', [
            'id' => $this->primaryKey(),
            'achievement_id' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_ar_achievement',
            'achievement_rules',
            'achievement_id',
            'achievements',
            'id',
            'CASCADE'
        );

        $this->createTable('user_achievements', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'achievement_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_ua_user', 'user_achievements', 'user_id', 'users', 'id', 'CASCADE');
        $this->addForeignKey('fk_ua_achievement', 'user_achievements', 'achievement_id', 'achievements', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('user_achievements');
        $this->dropTable('achievement_rules');
        $this->dropTable('achievements');
    }
}

