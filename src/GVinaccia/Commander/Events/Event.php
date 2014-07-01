<?php

namespace GVinaccia\Commander\Events;

/**
 * Class Event
 * @package Larascrum\Eventing
 */
class Event
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
} 