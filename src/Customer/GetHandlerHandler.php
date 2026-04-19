<?php

namespace dje\StripeCB\Customer;

use dje\StripeCB\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class GetHandler extends CoreHandler
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
        return $command->data['customer_token'];

//        try {
//            return \Stripe\Customer::retrieve($command->data['customer_token']);
//
//        } catch (\Exception $e) {
//            throw new \Exception($e->getMessage());
//        }
    }
}
