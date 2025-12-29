<?php
namespace app\controllers;


use yii\web\Controller;
use yii\web\Response;

class PaymentController extends Controller
{
    public function actionMethods()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['methods' => []];
    }

    public function actionPay($sum)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // логика платежа
        return ['status' => 'ok', 'sum' => $sum];
    }
}