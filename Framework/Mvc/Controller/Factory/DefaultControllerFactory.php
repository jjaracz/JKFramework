<?php

namespace Framework\Mvc\Controller\Factory;

use Framework\Mvc\Controller\Factory\ControllerFactoryInterface;

class DefaultControllerFactory implements ControllerFactoryInterface { 
    protected $config;
    
    public function create($key) {
        
    }
    
    public function setControllerConfig(array $config){
        $this->config = $config;
    }
}