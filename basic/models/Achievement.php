<?php

namespace app\models;


class Achievement extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%achievements}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['icon'], 'string'],
        ];
    }

    public function getRules()
    {
        return $this->hasMany(AchievementRule::class, ['achievement_id' => 'id']);
    }
}
