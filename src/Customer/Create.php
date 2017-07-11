<?php

namespace common\commands\Stripe\Customer;

use common\commands\Stripe\Core;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Create extends Core
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
            return \Stripe\Customer::create($this->data);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
