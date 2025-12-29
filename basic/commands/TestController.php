<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class TestController extends Controller
{
    public function actionInit()
    {

        Yii::$app->db->createCommand()->batchInsert(
            'external_request',
            ['external_id', 'status', 'payload'],
            [
                ['ext-1001', 'new', '{"foo":"bar"}'],
                ['ext-1002', 'processed', '{"foo":"baz"}'],
            ]
        )->execute();

        $this->stdout("External service seed inserted\n");


        return ExitCode::OK;
    }
}