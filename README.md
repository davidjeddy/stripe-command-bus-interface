# Stripe Command Bus Interface

A limited selection of [command bus](https://www.sitepoint.com/command-buses-demystified-a-look-at-the-tactician-package/)
style classes that overlay the Stripe PHP API classes.

## Install

Either `composer install davidjeddy/stripe-command-bus-interface`
Or add `"davidjeddy/stripe-command-bus-interface": "*",` to your projects composer.json in the `required` sections, the
run `composer install`.

## Usage

```
# basic command bus invocation
$response = \Yii::$app->commandBus->handle(
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