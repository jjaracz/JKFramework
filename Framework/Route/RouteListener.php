<?php

namespace Framework\Route;

use Framework\Route\Route;

class RouteListener {
    protected $controllersConfig;
    
    public function __construct(array $config) {
        $this->controllersConfig = $config;
    }
    
    public function listen($request){
        $parsed = $this->parseRoute($request);
    }
    
    public function parseRoute($request){
        $basePath = (isset($this->controllersConfig['url_pre'])) ? $this->controllersConfig['url_pre'] : "";
        $data = explode("/",str_replace($basePath,"",$request));
        
        $controller = null;
        $method = null;
        $additionalData = array();
        
        foreach($data as $value){
            if(!$controller){
                $controller = $value;
                continue;
            }
            
            if(!$method){
                $method = $value;
                continue;
            }
            
            if($controller && $method && !empty($value)){
                $additionalData[] = $value;
            }
        }
        
        $controllerObject = 
        
    }
}

