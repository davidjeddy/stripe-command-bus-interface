<?php

namespace dje\StripeCB\Customer;

use dje\StripeCB\CoreHandler;
use \Stripe\Customer;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class GetHandler extends CoreHandler
{
    /**
     * @param $command
     * @return mixed|Customer
     * @throws \Exception
     */
    public function handle($command)
    {
        try {
            return Customer::retrieve($command->data['customer_token']);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
