<?php

namespace GVinaccia\Commander;

/**
 * interface CommandBus
 * @package Larascrum\Commanding
 */
interface CommandBus
{
    /**
     * @param $command
     * @return mixed
     * @throws CommandHandlerNotFoundException
     */
    public function execute($command);
}