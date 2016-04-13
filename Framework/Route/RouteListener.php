<?php

namespace Framework\Route;

use Framework\Route\Route;

class RouteListener {

    protected $controllersConfig;
    protected $routeConfig;

    public function __construct(array $controllerConfig, array $routeConfig) {
        $this->controllersConfig = $controllerConfig;
        $this->routeConfig = $routeConfig;
    }

    public function listen($request) {
        $parsed = $this->parseRoute($request);
    }

    public function parseRoute($request) {
        $basePath = (isset($this->controllersConfig['url_pre'])) ? $this->controllersConfig['url_pre'] : "";
        $data = explode("/", str_replace($basePath, "", $request));
        
        $controller = null;
        $method = null;
        $additionalData = array();

        foreach ($data as $value) {
            if (!$controller) {
                $controller = $value;
                continue;
            }

            if (!$method) {
                $method = $value;
                continue;
            }

            if ($controller && $method && !empty($value)) {
                $additionalData[] = $value;
            }
        }

        $controller = (!empty($controller)) ? $controller : "/";
        $controllerObject = $this->bindController($controller);
    }

    public function bindController($name) {
        var_dump($name);
        foreach($this->routeConfig as $value){
            if($value['name'] === $name){ 
                $factory = $this->getControllerFactory();
                $factory->setControllerConfig($this->controllersConfig);
                $factory->create($value['controller']);
            }
        }
    }
    
    public function getControllerFactory(){
        $defaultControllerFactoryFromConfig = (isset($this->controllersConfig['DefaultFactory'])) ? $this->controllersConfig['DefaultFactory'] : null;
        $factory = null;
        
        if($defaultControllerFactoryFromConfig){
            $factory = new $defaultControllerFactoryFromConfig();
        } else {
            $factory = new Framework\Mvc\Controller\Factory\DefaultControllerFactory;
        }
        
        return $factory;
    }
}
