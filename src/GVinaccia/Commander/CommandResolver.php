<?php

namespace GVinaccia\Commander;

/**
 * Interface CommandResolver
 * @package GVinaccia\Commander
 */
interface CommandResolver
{
    /**
     * @param Command $command
     * @return string the command handler class
     * @throws CommandHandlerNotFoundException
     */
    public function toCommandHandler($command);

    /**
     * @param Command $command
     * @return mixed
     */
    public function toCommandValidator($command);
}