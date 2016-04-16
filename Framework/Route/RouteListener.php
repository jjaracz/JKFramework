<?php

namespace Framework\Route;

use Framework\Route\Router;

class RouteListener {

    protected $controllersConfig;
    protected $routeConfig;

    public function __construct(array $controllerConfig, array $routeConfig) {
        $this->controllersConfig = $controllerConfig;
        $this->routeConfig = $routeConfig;
    }

    public function listen($request) {
        $parsed = $this->parseRoute($request);

        return $parsed;
    }

    public function parseRoute($request) {
        $router = Router::getInstance();
        $router->setUrlPre($this->controllersConfig['url_pre']);
        
        $data = $router->parseRoute($request);

        $viewModel = $this->bindController($data['controller'], $data['method']);

        return $viewModel;
    }

    public function bindController($name, $method) {
        foreach ($this->routeConfig as $value) {
            if ($value['name'] === $name) {
                $router = Router::getInstance();
                $router->setRouteConfig($value);
                
                $factory = $this->getControllerFactory();
                $factory->setControllerConfig($this->controllersConfig);
                $controller = $factory->create($value['controller']);

                if (isset($controller)) {
                    if (isset($method)) {
                        if (method_exists($controller, $method . 'Action')) {
                            return call_user_func(array(&$controller, $method . 'Action'));
                        } else {
                            return $controller->indexAction();
                        }
                    } else {
                        if (isset($value['action'])) {
                            if (method_exists($controller, $method . 'Action')) {
                                return call_user_func(array(&$controller, $value['action'] . 'Action'));
                            } else {
                                return $controller->indexAction();
                            }
                        } else {
                            return $controller->indexAction();
                        }
                    }
                } else {
                    throw new \Exception("Kontroler nie istnieje ");
                }
            }
        }
    }

    public function getControllerFactory() {
        $defaultControllerFactoryFromConfig = (isset($this->controllersConfig['DefaultFactory'])) ? $this->controllersConfig['DefaultFactory'] : null;
        $factory = null;

        if ($defaultControllerFactoryFromConfig) {
            $factory = new $defaultControllerFactoryFromConfig();
        } else {
            $factory = new Framework\Mvc\Controller\Factory\DefaultControllerFactory;
        }

        return $factory;
    }

}
