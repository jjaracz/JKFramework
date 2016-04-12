<?php

namespace Framework\Route;

class RouteUnit {
    protected $routeArray;
    protected $alias;
    protected $name;

    public function __construct(array $routeArray = null) {
        if($routeArray){
            $this->routeArray = $routeArray;
        }
    }
    
    public function getAlias() {
        return $this->alias;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

