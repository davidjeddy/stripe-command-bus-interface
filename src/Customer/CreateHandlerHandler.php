<?php

namespace davidjeddy\StripeCB\Customer;

use davidjeddy\StripeCB\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CreateHandler extends CoreHandler
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
