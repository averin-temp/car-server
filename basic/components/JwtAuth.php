<?php

namespace app\components;

use Yii;
use yii\filters\auth\AuthMethod;

use app\models\User;
use yii\web\UnauthorizedHttpException;

class JwtAuth extends AuthMethod
{
    public function authenticate($user, $request, $response)
    {
        $jwt = $this->getTokenFromHeader($request);

        if($jwt === null) {
            throw new UnauthorizedHttpException('Unauthorized');
        }

        $token = new UserToken($jwt, Yii::$app->authService->jwtSecret, Yii::$app->authService->jwtAlg);

        if ($token->isExpired()) {
            throw new UnauthorizedHttpException('Token expired');
        }

        $user = User::findIdentity($token->getUid());
        Yii::$app->authService->setUser($user);

        return $user;
    }

    public function getTokenFromHeader($request)
    {
        $header = $request->getHeaders()->get('Authorization');
        if (!$header || !preg_match('/Bearer\s+(.*)$/i', $header, $matches)) {
            return null;
        }

        return $matches[1];
    }
}

