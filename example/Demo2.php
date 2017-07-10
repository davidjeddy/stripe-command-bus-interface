<?php
require __DIR__ . '/../vendor/autoload.php';

use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;

// Our example Command and Handler. ///////////////////////////////////////////
class RegisterUserCommand
{
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}

class RegisterUserHandler
{
    public function handleRegisterUserCommand(RegisterUserCommand $command)
    {
        // Do your core application logic here. Don't actually echo stuff. :)
        echo "User {$command->emailAddress} was registered using `{$command->password}` as a password.\n";
    }
}

// Setup the bus, normally in your DI container ///////////////////////////////
$locator = new InMemoryLocator();
// Register handler
// *->addHandler($handler, $commandClassName)
$locator->addHandler(new RegisterUserHandler(), RegisterUserCommand::class);

// Middleware is Tactician's plugin system. Even finding the handler and executing it is a plugin that we're configuring here.
$handlerMiddleware = new League\Tactician\Handler\CommandHandlerMiddleware(
    new ClassNameExtractor(),
    $locator,
    new HandleClassNameInflector()
);

$commandBus = new \League\Tactician\CommandBus([$handlerMiddleware]);

// Controller Code ////////////////////////////////////////////////////////////
$command = new \dje\StripeCB\Customer\View([
    'data' => [
        'customer_token' => 'cux_1234Asdf'
    ]
]);
$commandBus->handle($command);