<?php

namespace common\commands\Stripe;

use yii\base\Object;
use trntv\bus\interfaces\SelfHandlingCommand;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CoreHandler extends Object implements SelfHandlingCommand
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
     * @var mixed
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
            $class = '\common\commands\Stripe\\' . ucfirst($this->noun). '\\' . ucfirst($this->verb);
            $class = new $class;

            return $class->handle($command);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
