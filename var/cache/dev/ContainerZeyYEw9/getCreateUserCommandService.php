<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\DDD\UserInterface\CLI\Command\User\CreateUserCommand' shared autowired service.

include_once $this->targetDirs[3].'/src/DDD/UserInterface/CLI/Command/User/Interfaces/CreateUserCommandInterface.php';
include_once $this->targetDirs[3].'/src/DDD/UserInterface/CLI/Command/User/CreateUserCommand.php';

return $this->services['App\DDD\UserInterface\CLI\Command\User\CreateUserCommand'] = new \App\DDD\UserInterface\CLI\Command\User\CreateUserCommand();
