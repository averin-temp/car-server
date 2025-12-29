<?php

namespace app\models;


class UserAchievement extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user_achievements}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'achievement_id'], 'required'],
            [['user_id', 'achievement_id'], 'integer'],
        ];
    }

    public function getAchievement()
    {
        return $this->hasOne(Achievement::class, ['id' => 'achievement_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
