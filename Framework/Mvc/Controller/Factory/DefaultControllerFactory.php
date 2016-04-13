<?php

namespace Framework\Mvc\Controller\Factory;

use Framework\Mvc\Controller\Factory\ControllerFactoryInterface;

class DefaultControllerFactory implements ControllerFactoryInterface { 
    protected $config;
    
    public function create($controller) {
        $pre = (isset($this->config['controllers_pre'])) ? $this->config['controllers_pre'] : "";
        foreach($this->config['controllers'] as $key => $value){
            if($key === $controller){
                $e = $pre.'\\'.$value;
                
                return new $e();
            }
        }
    }
    
    public function setControllerConfig(array $config){
        $this->config = $config;
    }
}