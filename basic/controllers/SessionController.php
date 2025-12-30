<?php
namespace app\controllers;

use Yii;
use app\models\Car;
use app\components\BaseController;


/**
 *
 */
class SessionController extends BaseController
{
    public function actionStart()
    {
        $user = Yii::$app->authService->getUser();
        $car_id = Yii::$app->request->getBodyParam('car_id');
        $car = Car::findOne($car_id);
        $session_id = Yii::$app->carSessionManager->startSession($car, $user);
        return [
            'session' => [
                'session_id' => $session_id,
                'car_id' => $car->id,
                'user_id' => $user->id,
            ]
        ];
    }

    public function actionStop()
    {
        $session_id = Yii::$app->request->getBodyParam('session_id');
        Yii::$app->carSessionManager->stopSession($session_id);

        return [];
    }
}