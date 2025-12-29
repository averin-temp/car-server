<?php
namespace app\controllers;

use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class AchievementsController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [['class' => 'app\components\JsonResponseBehavior']]
        );
    }


    public function actionIndex($user_id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // логика получения достижений
        return ['achievements' => []];
    }
}