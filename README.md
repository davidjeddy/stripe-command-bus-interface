# Stripe Command Bus Interface

A limited selection of [command bus](https://www.sitepoint.com/command-buses-demystified-a-look-at-the-tactician-package/)
style classes that overlay the Stripe PHP API classes.

## Install

Either
 - `composer install davidjeddy/stripe-command-bus-interface`
 - or add `"davidjeddy/stripe-command-bus-interface": "*",` to your projects composer.json in the `required` sections,
    -[THEN](https://www.youtube.com/channel/UCPSfjD7o1CQZXzdAy56c8kg) run `composer install`.

## Usage

 1) Copy .env.dist as .env in the root of project
 2) Add Stripe public and private key to .env per [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) usage.
 3) Implement command bus logic:

```
# basic command bus invocation
$commandBus = new \
$response = $commandBus->handle(
    # the Stripe Command Bus core class. All requests pass through this class.
    new \dje\StripeCB\Customer\Create([
        # the Stripe data is passed to the command bus handlers as the `data` property
        'data' => [
            'description'   => $companyMDL->name,
            'email'         => \Yii::$app->user->getIdentity()->emil,
            'source'        => $billingDetailsMDL->getAttributes()
        ]
    ])
);
```

 - `$response` is passed from the Stripe class response back to you,
 - When mapping information for a Stripe class, it will always be contained within the 'data' array key