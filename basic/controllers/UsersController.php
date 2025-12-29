<?php
namespace app\controllers;

use Yii;
use app\components\BaseController;
use app\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class UsersController extends BaseController
{
    public function actionList()
    {
        return User::find()->select('id, username')->asArray()->all();
    }

    public function actionCreate()
    {
        // логика создания пользователя
        throw new ForbiddenHttpException("this action disabled");
    }

    public function actionUpdate($id)
    {
        // логика обновления пользователя
        throw new ForbiddenHttpException("this action disabled");
    }

    public function actionDelete($id)
    {
        // логика удаления пользователя
        throw new ForbiddenHttpException("this action disabled");
    }
}
