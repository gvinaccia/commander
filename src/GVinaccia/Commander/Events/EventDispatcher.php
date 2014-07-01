<?php

namespace GVinaccia\Commander\Events;


use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

/**
 * Class EventDispatcher
 * @package Larascrum\Eventing
 */
class EventDispatcher
{
    /**
     * @var \Illuminate\Events\Dispatcher
     */
    protected $eventDispatcher;

    /**
     * @var \Illuminate\Log\Writer
     */
    protected $log;

    /**
     * @param Dispatcher $eventDispatcher
     * @param Writer $log
     */
    function __construct(Dispatcher $eventDispatcher, Writer $log)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->log = $log;
    }

    /**
     * @param $events
     */
    public function dispatch($events)
    {
        foreach ($events as $event) {
            $eventName = $this->resolveEventName($event);

            $this->eventDispatcher->fire($eventName, $event);

            $this->log->info("Event $eventName was fired");
        }
    }

    /**
     * @param $event
     * @return mixed
     */
    protected function resolveEventName($event)
    {
        return $event->getName();
    }
} 