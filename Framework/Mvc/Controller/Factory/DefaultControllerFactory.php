<?php

namespace Framework\Mvc\Controller\Factory;

use Framework\Mvc\Controller\Factory\ControllerFactoryInterface;

class DefaultControllerFactory implements ControllerFactoryInterface { 
    protected $config;
    
    public function create($controller) {
        $pre = (isset($this->controllersConfig['controllers_pre'])) ? $this->controllersConfig : "";
        foreach($this->config['controllers'] as $key => $value){
            if($key === $controller){
                
            }
        }
    }
    
    public function setControllerConfig(array $config){
        $this->config = $config;
    }
}