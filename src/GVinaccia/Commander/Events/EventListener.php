<?php

namespace GVinaccia\Commander\Events;

use ReflectionClass;

/**
 * Class EventListener
 * @package Larascrum\Eventing
 */
class EventListener
{
    /**
     * @param $event
     * @return mixed
     */
    public function handle($event)
    {
        $eventName = $this->getEventName($event);

        if ($this->listenerIsRegisterd($eventName)) {
            return call_user_func([$this, 'when' . $eventName], $event);
        }
    }

    /**
     * @param $event
     * @return string
     */
    protected function getEventName($event)
    {
        if (method_exists($event, 'getName')) {
            return $event->getName();
        } else {
            return (new ReflectionClass($event))->getShortName();
        }
    }

    /**
     * @param $eventName
     * @return bool
     */
    private function listenerIsRegisterd($eventName)
    {
        $method = "when{$eventName}";

        return method_exists($this, $eventName);
    }
} 