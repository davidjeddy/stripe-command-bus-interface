<?php

namespace common\commands\Stripe\Customer;

use common\commands\Stripe\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Get extends CoreHandler
{
    /**
     *
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @param $command
     * @return \Stripe\Customer
     * @throws \Exception
     */
    public function handle($command)
    {
        try {
            return \Stripe\Customer::retrieve($command->data['customer_token']);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
