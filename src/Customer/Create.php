<?php

namespace dje\StripeCB\Customer;

use dje\StripeCB\Core;
use Stripe\Stripe;

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

        // sane defaults
        if (!isset($this->data['source']['object'])) {
            $this->data['source']['object'] = 'card';
        }
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