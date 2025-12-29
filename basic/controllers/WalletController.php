<?php
namespace app\controllers;


use app\models\Wallet;
use yii\rest\ActiveController;
use app\components\JwtAuth;

class WalletController extends ActiveController
{
    public $modelClass = Wallet::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => JwtAuth::class,
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function actionMy()
    {
        return Wallet::findOne(['user_id' => Yii::$app->user->id]);
    }
}


// --


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;



