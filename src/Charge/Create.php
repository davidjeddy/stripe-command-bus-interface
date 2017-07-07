<?php

namespace dje\StripeCB\Charge;

use dje\StripeCB\Core;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class Create extends Core
{
    /**
     * @var string
     */
    public $currency = 'usd';

    /**
     * Command init
     * Set the keys to obj->prop
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @param $command
     * @return bool|\Exception|\Stripe\Charge|\Stripe\Error\ApiConnection|\Stripe\Error\Authentication|\Stripe\Error\Card|\Stripe\Error\InvalidRequest|\Stripe\Error\RateLimit
     * @throws \Exception
     */
    public function handle($command)
    {
        if (!$command instanceof \dje\StripeCB\Core) {
            throw new \Exception(__CLASS__ . 'handle() parameter must be of type \dje\StripeCB\StripeCore.');
        }

        $returnData = false;

        try {
            $returnData = \Stripe\Charge::create([
                'amount'    => $command->data['amount'],
                'description' => (isset($command->data['desc']) ? $command->data['desc'] : 'Test Charge'),
                'currency'  => null !== env('STRIPE_CURRENCY') ? env('STRIPE_CURRENCY') : $this->currency,
                'source'    => [
                    'object'    => (isset($command->data['object']) ? $command->data['amount'] : 'card'),
                    'cvc'       => $command->data['cvc'],
                    'exp_month' => $command->data['exp_month'],
                    'exp_year'  => $command->data['exp_year'],
                    'number'    => $command->data['number'],
                ]
            ]);
        } catch(\Stripe\Error\Card $returnData) {
            // Since it's a decline, \Stripe\Error\Card will be caught
        } catch (\Stripe\Error\RateLimit $returnData) {
            // Too many requests made to the API too quickly
        } catch (\Stripe\Error\InvalidRequest $returnData) {
            // Invalid parameters were supplied to Stripe's API
        } catch (\Stripe\Error\Authentication $returnData) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
        } catch (\Stripe\Error\ApiConnection$returnData) {
            // Network communication with Stripe failed
        } catch (\Stripe\Error\Base $returnData) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
        } catch (\Exception $returnData) {
            // Something else happened, completely unrelated to Stripe
        }

        return $returnData;
    }
}
