<?php

namespace Framework\Events;

use \Framework\Events\AbstractEventManager as AbstractEventManager;

class EventManager extends AbstractEventManager { 
    public function callEvents(){
        foreach($this->events as $value){
            $value->call();
        }
    }
}