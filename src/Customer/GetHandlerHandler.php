<?php

namespace davidjeddy\StripeCB\Customer;

use dje\StripeCB\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class GetHandler extends CoreHandler
{
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
