<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\DDD\UserInterface\WEB\Action\Home\HomeAction' shared autowired service.

include_once $this->targetDirs[3].'/src/DDD/UserInterface/WEB/Action/Home/Interfaces/HomeActionInterface.php';
include_once $this->targetDirs[3].'/src/DDD/UserInterface/WEB/Action/Home/HomeAction.php';

return $this->services['App\DDD\UserInterface\WEB\Action\Home\HomeAction'] = new \App\DDD\UserInterface\WEB\Action\Home\HomeAction(($this->services['twig'] ?? $this->getTwigService()));
