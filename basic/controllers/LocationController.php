<?php
namespace app\controllers;

use app\components\BaseController;
use app\models\Location;


/**
 *
 */
class LocationController extends BaseController
{
    public function actionList()
    {
        return Location::find()->select('id, name, image')->asArray()->all();
    }
}