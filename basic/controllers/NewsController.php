<?php
namespace app\controllers;

use app\models\NewsArticle;
use app\components\BaseController;

class NewsController extends BaseController
{
    public function actionList()
    {
        return NewsArticle::find()->asArray()->all();
    }
}