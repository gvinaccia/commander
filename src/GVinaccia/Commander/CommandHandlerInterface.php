<?php

namespace GVinaccia\Commander;


/**
 * Interface CommandHandlerInterface
 * @package Larascrum\Commanding
 */
interface CommandHandlerInterface
{
    /**
     * @param Command $command
     * @return mixed
     */
    public function handle(Command $command);
} 