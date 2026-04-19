<?php

namespace davidjeddy\StripeCB\Customer;

use dje\StripeCB\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class DeleteHandler extends CoreHandler
{
    /**
     * @param $command
     * @return \Stripe\Customer
     * @throws \Exception
     */
    public function handle($command)
    {
        try {
            $stripeCustomer = \Stripe\Customer::retrieve($command->data['customer_token']);
            $stripeCustomer->delete();
            return $stripeCustomer;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
