<?php

namespace dje\StripeCB;

use dje\StripeCB\base\Object;
use dje\StripeCB\bus\interfaces\SelfHandlingCommand;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CoreHandler extends Object implements SelfHandlingCommand
{
    /**
     * @var null
     */
    public $data = null;

    /**
     * Load Stripe private key from .env
     */
    public function init()
    {
        \Stripe\Stripe::setApiKey(getenv('STRIPE_PRV_KEY'));
    }

    /**
     * @param $command
     * @return string
     * @throws \Exception
     */
    public function handle($command)
    {
        return $command;
    }
}
