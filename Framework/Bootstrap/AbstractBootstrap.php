<?php

namespace Framework\Bootstrap;

use Framework\Events\AbstractEventManager;
use Framework\Events\EventManager;

abstract class AbstractBootstrap {
    private $eventManager;
    
    public function getEventManager(){
        if(!$this->eventManager){
            $this->eventManager = new EventManager();
        }
        return $this->eventManager;
    }
    
    public function setEventManager(AbstractEventManager $em){
        $this->eventManager = $em;
    }
    
    public function getEvents(){
        return $this->getEventManager()->events;
    }
}
