# Stripe Command Bus Interface

A limited selection of [command bus](https://www.sitepoint.com/command-buses-demystified-a-look-at-the-tactician-package/)
style classes that overlay the Stripe PHP API classes.

## Install

 - Either `composer install davidjeddy/stripe-command-bus-interface`
 - Or add `"davidjeddy/stripe-command-bus-interface": "*",` to your projects composer.json in the `required` sections, the
run `composer install`.

## Usage

### Yii2 Implementation

 - Enable the `trntv/yii2-command-bus` by adding it to config/base.php `components`.
    * Note: If you already have a command bus handler. this step is not needed.
```
 $config = [
     ...
     'components' => [
         ...
         'commandBus' => [
             'class' => 'trntv\bus\CommandBus',
             'middlewares' => [
                 [
                     'class' => \trntv\bus\middlewares\BackgroundCommandMiddleware::class,
                     'backgroundHandlerPath' => '@console/yii',
                     'backgroundHandlerRoute' => 'command-bus/handle',
                 ]
             ]
         ],
      ...
 ];
```

 - Then, in the application logic you can invoke the command handler classes:
```
$response = \Yii::$app->commandBus->handle(
    new \common\commands\Stripe\Customer\GetHandler([
        'data' => [
            'customer_token' => 'someValue'
        ]
    ])
);
```

### Laravel Implementation

### Raw Command Bus Implementation

 - `$response` is passed from the Stripe class response back to you,
 - When mapping information for a Stripe class, it will always be contained within the 'data' array key

## TODO:
 - Laravel and Raw CB implementations
 - tests