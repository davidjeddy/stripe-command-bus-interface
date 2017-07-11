<?php

namespace dje\StripeCB;

use yii\base\Object;
use trntv\bus\interfaces\SelfHandlingCommand;

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
     * @return mixed
     */
    public function handle($command)
    {
        return $command;
    }
}
