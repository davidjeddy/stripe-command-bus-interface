<?php

namespace davidjeddy\StripeCB;

use davidjeddy\StripeCB\Interfaces\HandlerInterface;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CoreHandler implements HandlerInterface
{
    /**
     * @var null
     */
    public $data = null;

    /**
     * Load Stripe private key from .env
     *
     * @param \Stripe\Stripe $stripe
     * @param string $stripe_private_key
     */
    public function init(\Stripe\Stripe $stripe, string $stripe_private_key)
    {
        $stripe::setApiKey($stripe_private_key);
    }

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $command;
    }
}
