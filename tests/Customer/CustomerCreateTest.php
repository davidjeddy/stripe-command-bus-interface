<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CustomerCreateTest extends TestCase
{
    /**
     * I am not interested in testing the functionality of the Stripe dependency, I want to test the CB implementation.
     * @covers \dje\StripeCB\Customer\Create::handle()
     */
    public function testCreateUserHandle()
    {
        $response = $commandBus->handle(
        # the Stripe Command Bus core class. All requests pass through this class.
            new \dje\StripeCB\Customer\Create([
                # the Stripe data is passed to the command bus handlers as the `data` property
                'data' => [
                    'description'   => 'Test Co. LLC',
                    'email'         => 'test@email.com',
                ]
            ])
        );
    }
}