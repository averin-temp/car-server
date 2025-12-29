<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

class NewsController extends Controller
{
    public function actionList($user_id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // логика получения новостей
        return ['news' => []];
    }
}