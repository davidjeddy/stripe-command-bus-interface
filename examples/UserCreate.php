<?php
declare(strict_types=1);

require_once '/scbi/vendor/autoload.php';
$commandBus = new \League\Tactician\CommandBus();

# basic command bus class to handler
$response = $commandBus->handle(
# the Stripe Command Bus core class. All requests pass through this class.
    new CreateHandler([
        # the Stripe data is passed to the command bus handlers as the `data` property
        'data' => [
            'description'   => 'Test Co. LLC',
            'email'         => 'test@email.com',
        ]
    ])
);