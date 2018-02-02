<?php

namespace davidjeddy\StripeCB\Customer;

use dje\StripeCB\CoreHandler;
use Stripe\Stripe;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CreateHandler extends CoreHandler
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
            return \Stripe\Customer::create($command->data);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
