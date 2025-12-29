<?php

namespace app\models;


class AchievementRule extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%achievement_rules}}';
    }

    public function rules()
    {
        return [
            [['achievement_id', 'type'], 'required'],
            [['achievement_id', 'type'], 'integer'],
        ];
    }

    public function getAchievement()
    {
        return $this->hasOne(Achievement::class, ['id' => 'achievement_id']);
    }
}
