<?php

namespace GVinaccia\Commander;

use Illuminate\Foundation\Application;

/**
 * Class ValidationCommandBus
 * @package Larascrum\Commanding
 */
class ValidationCommandBus implements CommandBus
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
     * @var DefaultCommandBus
     */
    protected $defaultCommandBus;

    /**
     * @param Application $application
     * @param BaseCommandBus $defaultCommandBus
     * @param CommandResolver $commandResolver
     */
    function __construct(Application $application,BaseCommandBus $defaultCommandBus,  CommandResolver $commandResolver)
    {
        $this->commandResolver = $commandResolver;
        $this->app = $application;
        $this->defaultCommandBus = $defaultCommandBus;
    }

    /**
     * @param $command
     * @return mixed
     * @throws CommandHandlerNotFoundException
     */
    public function execute($command)
    {
        // validate the command if necessary
        $validatorClass = $this->commandResolver->toCommandValidator($command);

        if (class_exists($validatorClass)) {
            $validator = $this->app->make($validatorClass);

            if ($validator instanceof CommandValidatorInterface) {
                $validator->validate($command);
            }
        }

        // execute the command
        return $this->defaultCommandBus->execute($command);
    }
}