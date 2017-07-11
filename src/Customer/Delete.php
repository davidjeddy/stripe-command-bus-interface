<?php

namespace common\commands\Stripe\Customer;

use common\commands\Stripe\Core;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Delete extends Core
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
            $stripeCustomer = \Stripe\Customer::retrieve($command->data['customer_token']);
            return $stripeCustomer->delete();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
