<?php
namespace app\controllers;

use Yii;
use app\components\BaseController;
use app\models\User;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;

class UsersController extends BaseController
{
    public function actionList()
    {
        return User::find()->select('id, username')->asArray()->all();
    }

    public function actionRegister()
    {
        $model = new \app\models\RegistrationModel();
        $model->load(Yii::$app->request->getBodyParams(), '');
        if ($model->validate()) {
            $user = $model->register();
            return ['user_id' => $user->id];
        }

        $errors = $model->getFirstErrors();
        throw new BadRequestHttpException(reset($errors));
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


    public function publicActions()
    {
        return ['register'];
    }
}
