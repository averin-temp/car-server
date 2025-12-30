<?php
namespace app\controllers;


use Yii;
use app\components\BaseController;
use yii\web\BadRequestHttpException;


class AuthController extends BaseController
{
    public function actionToken()
    {
        $model = new \app\models\TokenIssueModel();
        $model->load(Yii::$app->request->getBodyParams(), '');
        if ($model->validate()) {
            $token = $model->issueToken();
            return ['token' => $token->__toString(), 'expire' => $token->getExpire()];
        }

        throw new BadRequestHttpException($model->getFirstErrors());
    }

    public function actionRegister()
    {
        $model = new \app\models\RegistrationModel();
        $model->load(Yii::$app->request->getBodyParams(), '');
        if ($model->validate()) {
            $user = $model->register();
            return ['user_id' => $user->id];
        }

        throw new BadRequestHttpException($model->getFirstErrors());
    }

    public function publicActions()
    {
        return ['register', 'token'];
    }
}