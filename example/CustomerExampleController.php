<?php

namespace console\controllers;

use yii\console\Controller;

/**
 * Class StripeCBExampleController
 * @package dje\StripeCB
 */
class CustomerExampleController extends Controller
{
    /**
     * @return mixed
     */
    public function actionCreateCustomer()
    {
        $this->stdout(__METHOD__ . "\n");

        try {
            $this->stdout('Sending payload to CommandBus, targeting the Customer CreateHandler class:' . "\n");
            return \Yii::$app->commandBus->handle(
                new \dje\StripeCB\Customer\CreateHandler([
                    'data' => [
                        'description'   => 'Test company',
                        'email'         => 'test@email.com'
                    ]
                ])
            );
        } catch (\Exception $e) {
            $this->stdout($e->getMessage() . "\n");
        }

        return $this->stdout('Nothing happen!?' . "\n");
    }
}
