<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.messenger_consume_messages' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/vendor/symfony/messenger/Command/ConsumeMessagesCommand.php';

$this->privates['console.command.messenger_consume_messages'] = $instance = new \Symfony\Component\Messenger\Command\ConsumeMessagesCommand(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
    'messenger.bus.default' => array('services', 'message_bus', 'getMessageBusService', false),
)), new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
    'amqp' => array('privates', 'messenger.transport.amqp', 'getMessenger_Transport_AmqpService.php', true),
    'messenger.transport.amqp' => array('privates', 'messenger.transport.amqp', 'getMessenger_Transport_AmqpService.php', true),
)), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()), array(0 => 'amqp'), array(0 => 'messenger.bus.default'));

$instance->setName('messenger:consume-messages');

return $instance;