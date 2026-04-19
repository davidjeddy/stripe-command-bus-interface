<?php
declare(strict_types=1);

# Namespace
namespace dje\StripeCB;

# Use
use Stripe\Stripe;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CoreHandler
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
    public function init(Stripe $stripe, string $stripe_private_key)
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
