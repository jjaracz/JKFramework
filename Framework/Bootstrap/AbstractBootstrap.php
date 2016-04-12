<?php

namespace Framework\Bootstrap;

use Framework\Events\AbstractEventManager;

abstract class AbstractBootstrap {
    private $eventManager;
    
    public function getEventManager(){
        return $this->eventManager;
    }
    
    public function setEventManager(AbstractEventManager $em){
        $this->eventManager = $em;
    }
}
