<?php

namespace Framework\Events;

use \ReflectionClass as Reflection;
use \Exception as Exception;
use Framework\Events\Event;

class EventValidator {
    public static function isCallable(Event $e){
        $reflection = new Reflection($e->getObject());
        
        return $reflection->hasMethod($e->getMethod());
    }
}

