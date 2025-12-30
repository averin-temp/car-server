<?php

namespace app\components;


use app\models\Car;
use app\models\CarSession;
use yii\base\Exception;
use yii\web\Session;

class CarSessionManager extends \yii\base\Component
{
    /**
     * @param Car $car
     * @return int
     */
    public function startSession($car, $user)
    {
        if($car->state == Car::STATE_BUSY) {
            throw new Exception("Машинка занята");
        }

        $car->state = Car::STATE_BUSY;
        $car->save(false);


        $session = new CarSession();
        $session->car_id = $car->id;
        $session->user_id = $user->id;
        $session->start = time();
        $session->end = time() + 5000;
        $session->save(false);


        return $session->id;
    }

    /**
     * @param int $session_id
     * @return void
     */
    public function stopSession($session_id)
    {
        $session = CarSession::findOne($session_id);
        $session->end = time();
        $session->active = false;
        $session->save(false);

        $car = $session->car;
        $car->state = Car::STATE_FREE;
        $car->save(false);
    }



}