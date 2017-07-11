# Stripe Command Bus Interface

## Status / Version

EARLY ALPHA! I had a need so created a solution.
(See [SemVer](http://semver.org/) for an explanation of version numbering.)

## Description

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
# basic command bus class to handler
$response = $commandBus->handle(
    # the Stripe Command Bus core class. All requests pass through this class.
    new \dje\StripeCB\Customer\CreateHandler([
        # the Stripe data is passed to the command bus handlers as the `data` property
        'data' => [
            'description'   => 'Test Co. LLC',
            'email'         => 'test@email.com',
        ]
    ])
);
```

 - `$response` is passed from the Stripe class response back to you,
 - When mapping information for a Stripe class, it will always be contained within the 'data' array key

## Demo

 - Properly install and configure package dependencies (.env, stripe-php)
 - Copy ./example/CustomerExampleController.php to your applications ./console/controller directory
 - execution `php ./console/yii customer-example/create-customer`
 - Observe results.
