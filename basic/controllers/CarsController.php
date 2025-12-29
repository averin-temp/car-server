<?php
namespace app\controllers;

use Yii;
use yii\web\Response;
use app\components\BaseController;


/**
 *
 */
class CarsController extends BaseController
{
    public function actionList($location)
    {
        return [];
    }

    public function actionTake($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // логика взятия машины
        return ['status' => 'ok', 'car_id' => $id];
    }

    public function actionRelease($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // логика возврата машины
        return ['status' => 'ok', 'car_id' => $id];
    }
}