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

        $errors = $model->getFirstErrors();
        throw new BadRequestHttpException(reset($errors));
    }



    public function publicActions()
    {
        return ['token'];
    }
}