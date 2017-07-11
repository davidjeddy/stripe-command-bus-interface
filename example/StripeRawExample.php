<?php
require __DIR__ . '/../vendor/autoload.php';

use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;

use \dje\StripeCB\Customer\GetHandler as GetCustomerHandler;



// Our example Command and Handler. ///////////////////////////////////////////
class RegisterUserCommand
{
    public $data;
}

// Handler class is dje\StripeCB\Customer\GetHandler as GetCustomerHandler
//class RegisterUserHandler
//{
//    public function handleRegisterUserCommand(RegisterUserCommand $command)
//    {
//        // Do your core application logic here. Don't actually echo stuff. :)
//        // echo "User {$command->emailAddress} was registered!\n";
//        return "User {$command->data['customer_token']} processed!\n";
//    }
//}



// Setup the bus, normally in your DI container ///////////////////////////////
$locator = new InMemoryLocator();
$locator->addHandler(new GetCustomerHandler, RegisterUserCommand::class);

// Middleware is Tactician's plugin system. Even finding the handler and executing it is a plugin that we're configuring here.
$handlerMiddleware = new League\Tactician\Handler\CommandHandlerMiddleware(
    new ClassNameExtractor(),
    $locator,
    new HandleClassNameInflector()
);

$commandBus = new \League\Tactician\CommandBus([$handlerMiddleware]);



// Controller Code ////////////////////////////////////////////////////////////
$command = new RegisterUserCommand([
    'data' => [
        'customer_token' => 'SomeToken'
    ]
]);

echo $commandBus->handle($command);
