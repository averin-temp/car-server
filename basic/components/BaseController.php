<?php

namespace app\components;

use yii\filters\auth\CompositeAuth;
use yii\filters\RateLimiter;
use yii\filters\VerbFilter;

class BaseController extends \yii\rest\Controller
{
    public function behaviors()
    {
        return [
            'verbFilter' => [
                'class' => VerbFilter::class,
                'actions' => $this->verbs(),
            ],
            'authenticator' => [
                'class' => CompositeAuth::class,
                'authMethods' => [
                    JwtAuth::class,
                ],
                'except' => $this->publicActions(),
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
            ],
        ];
    }

    public function publicActions()
    {
        return [];
    }
}