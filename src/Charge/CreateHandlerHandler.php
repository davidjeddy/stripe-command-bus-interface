<?php

namespace dje\StripeCB\Charge;

use dje\StripeCB\CoreHandler;

/**
 * @author David J Eddy <me@davidjeddy.com>
 */
class CreateHandler extends CoreHandler
{
    /**
     *
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @param $command
     * @return string|\Stripe\Charge
     */
    public function handle($command)
    {
        $returnData = false;

        try {
            return \Stripe\Charge::create([
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

        return $returnData->getMessage();
    }
}
