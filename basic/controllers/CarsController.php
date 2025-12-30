<?php
namespace app\controllers;

use app\models\Car;
use app\models\Location;
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
        return Car::find()->select('id, image, location_id, state, session_id')->where(['location_id' => $location])->asArray()->all();
    }
}