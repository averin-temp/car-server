<?php

namespace app\components;

use Yii;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

class ApiResponseFormatter extends JsonResponseFormatter
{
    public $prettyPrint = YII_DEBUG;

    public function format($response)
    {
        // оригинальные данные
        $data = $response->data;
        $statusCode = $response->statusCode;
        $isError = $statusCode >= 400;

        $formatted = [
            'status' => $isError ? 'error' : 'success',
            'code' => $statusCode,
        ];

        if($isError === false) {
            $formatted['data'] = $data;
        }

        if ($isError) {
            $formatted['message'] = $data['message'];
        }

        $response->data = $formatted;

        return parent::format($response);
    }
}
