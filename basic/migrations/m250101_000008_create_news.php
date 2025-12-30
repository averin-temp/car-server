<?php
use yii\db\Migration;

class m250101_000008_create_news extends Migration
{
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'content' => $this->text(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('news');
    }
}
