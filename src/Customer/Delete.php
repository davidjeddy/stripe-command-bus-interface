<?php

namespace dje\StripeCB\Customer;

use dje\StripeCB\Core;
use dje\bus\interfaces\SelfHandlingCommand;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Delete extends Core implements SelfHandlingCommand
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
            $stripeCustomer->delete();
            return $stripeCustomer;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
