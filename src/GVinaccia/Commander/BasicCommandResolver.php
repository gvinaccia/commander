<?php

namespace GVinaccia\Commander;

/**
 * Class BasicCommandResolver
 * @package Larascrum\Commanding
 */
class BasicCommandResolver implements CommandResolver
{
    /**
     * @param Command $command
     * @return string the command handler class
     * @throws CommandHandlerNotFoundException
     */
    public function toCommandHandler(Command $command)
    {
        $handlerName = preg_replace('/Command$/', 'CommandHandler', get_class($command));

        if (! class_exists($handlerName)) {
            $message = "Command handler [$handlerName] not found";
            throw new CommandHandlerNotFoundException($message);
        }

        return $handlerName;
    }


    public function toCommandValidator(Command $command)
    {
        return preg_replace('/Command$/', 'Validator', get_class($command));
    }
}