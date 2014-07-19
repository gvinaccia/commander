<?php

namespace GVinaccia\Commander;

use Illuminate\Foundation\Application;

/**
 * Class BaseCommandBus
 * @package Larascrum\Commanding
 */
class BaseCommandBus implements CommandBus
{
    /**
     * @var BasicCommandResolver
     */
    protected $commandResolver;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @param Application $application
     * @param CommandResolver $commandResolver
     */
    function __construct(Application $application, CommandResolver $commandResolver)
    {
        $this->commandResolver = $commandResolver;
        $this->app = $application;
    }

    /**
     * @param $command
     * @return mixed
     * @throws CommandHandlerNotFoundException
     */
    public function execute($command)
    {
        $handler = $this->getHandler($command);

        return $handler->handle($command);
    }

    /**
     * @param Command $command
     * @return CommandHandlerInterface
     * @throws CommandHandlerNotFoundException
     */
    public function getHandler($command)
    {
        $handler = $this->app->make($this->commandResolver->toCommandHandler($command));

        return $handler;
    }
} 