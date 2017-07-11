<?php

namespace dje\StripeCB;

use dje\StripeCB\base\Object;
use dje\StripeCB\bus\interfaces\SelfHandlingCommand;

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
        if (!$command instanceof \dje\StripeCB\Core) {
            throw new \Exception(__CLASS__ . 'handle($command) parameter must be extended from \dje\StripeCB\Core.');
        }

        return $command;
    }
}
