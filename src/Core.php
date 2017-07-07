<?php

namespace dje\StripeCB;

use dje\base\Object;
use dje\bus\interfaces\SelfHandlingCommand;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Core extends Object implements SelfHandlingCommand
{
    /**
     * @var null
     */
    public $data = null;

    /**
     * Command init
     * Set the keys to obj->prop
     */
    public function init()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_PRV_KEY'));
    }

    /**
     * @param $command
     * @return string
     * @throws \Exception
     */
    public function handle($command)
    {
        throw new \Exception('Do not use \StripeCore->handle() directly.');
    }
}
