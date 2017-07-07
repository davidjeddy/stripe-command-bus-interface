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
     * @var string
     */
    public $noun = '';

    /**
     * @var string
     */
    public $verb = 'create';

    /**
     * @var null
     */
    public $data = null;

    /**
     * @var string
     */
    protected $privateKey;

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
        if (!$this->noun ||!$this->verb) {
            throw new \Exception('Please provide noun target and verb action in command bus parameters array.');
        }

        try {
            $class = '\dje\StripeCB\\' . ucfirst($this->noun). '\\' . ucfirst($this->verb);
            $class = new $class;

            return $class->handle($command);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
