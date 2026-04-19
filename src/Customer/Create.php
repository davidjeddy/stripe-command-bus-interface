<?php

namespace dje\StripeCB\Customer;

use dje\StripeCB\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Create extends CoreHandler
{
    /**
     * @param $command
     * @return \Stripe\Customer
     * @throws \Exception
     */
    public function handle($command)
    {
        try {
            return \Stripe\Customer::create($command->data);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
