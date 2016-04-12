<?php

namespace Framework\Events;

class Event {
    protected $object;
    protected $method;
    
    public function bind(array $callable){
        $this->setObject($callable[0]);
        $this->setMethod($callable[1]);
    }
    
    public function getObject() {
        return $this->object;
    }

    public function getMethod() {
        return $this->method;
    }

    public function setObject($object) {
        $this->object = $object;
    }

    public function setMethod($method) {
        $this->method = $method;
    }
    
    public function setKey($key){
        $this->key = $key;
    }
    
    public function getKey(){
        return $this->key;
    }
    
    public function call(){
        call_user_method($this->getMethod(), $this->getObject());
    }
}

