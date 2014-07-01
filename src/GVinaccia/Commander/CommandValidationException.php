<?php

namespace GVinaccia\Commander;

use Exception;

/**
 * Class CommandValidationException
 * @package Larascrum\Commanding
 */
class CommandValidationException extends Exception
{

    /**
     * @var string
     */
    private $command;

    /**
     * @var array
     */
    private $validator;


    /**
     * @param string $command
     */
    public function __construct($command, $validator)
    {
        parent::__construct("validation of $command command failed");

        $this->command = $command;
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }
}
