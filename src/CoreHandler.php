<?php

namespace davidjeddy\StripeCB;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CoreHandler implements SelfHandlingCommand
{
    /**
     * @var null
     */
    public $data = null;

    /**
     * Load Stripe private key from .env
     *
     * @param string $stripe_priv_key
     */
    public function init(string $stripe_priv_key)
    {
        \Stripe\Stripe::setApiKey($stripe_priv_key);
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
