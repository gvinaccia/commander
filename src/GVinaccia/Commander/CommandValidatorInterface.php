<?php

namespace GVinaccia\Commander;

/**
 * Interface CommandValidatorInterface
 * @package Larascrum\Commanding
 */
interface CommandValidatorInterface
{
    /**
     * @param $command
     * @return mixed
     */
    public function validate($command);
}