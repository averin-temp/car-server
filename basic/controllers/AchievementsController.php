<?php
namespace app\controllers;

use app\models\Achievement;
use yii\helpers\ArrayHelper;
use app\components\BaseController;
use yii\web\Response;

class AchievementsController extends BaseController
{
    public function actionList()
    {
        return Achievement::find()->asArray()->all();
    }
}