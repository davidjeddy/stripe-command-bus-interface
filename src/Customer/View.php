<?php

namespace dje\StripeCB\Customer;

use dje\StripeCB\Core;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class View extends Core
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
        if (!$command instanceof \dje\StripeCB\Core) {
            throw new \Exception(__CLASS__ . 'handle() parameter must be of type \dje\StripeCB\StripeCore.');
        }

        $response = \Stripe\Customer::retrieve($command->data['customer_token']);

        return $response;
    }
}
