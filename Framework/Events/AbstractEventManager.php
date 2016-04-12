<?php

namespace Framework\Events;

use Framework\Events\Event;
use Framework\Events\EventValidator;
use Framework\Events\EventManagerInterface;

abstract class AbstractEventManager implements EventManagerInterface {

    protected $events = Array();

    public function attachEvent(Event $event) {
        if (EventValidator::isCallable($event)) {
            if(isset($this->events[$event->getKey()])){
                throw new Exception("Event o tej nazwie juz istnieje"); 
            } else {
                $this->events[$event->getKey()] = $event;
            }
        } else {
            throw new Exception("Błąd w dołączaniu eventu");
        }
    }

    public function getEvent() {
        return $this->event;
    }

    public function setEvent(Event $event) {
        $this->event = $event;
    }

    public function callEvent($eventKey){
        if(isset($this->events[$eventKey])){
            $this->events[$eventKey]->call();
        }
    }
}
