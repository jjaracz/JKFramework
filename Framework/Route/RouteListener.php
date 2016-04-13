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

        $controllerObject = $this->bindController($controller, $method);
    }

    public function bindController($name, $method) {
        foreach ($this->routeConfig as $value) {
            if ($value['name'] === $name) {
                $factory = $this->getControllerFactory();
                $factory->setControllerConfig($this->controllersConfig);
                $controller = $factory->create($value['controller']);

                if (isset($controller)) {
                    if (isset($method)) {
                        call_user_method($method . 'Action', $controller);
                    } else {
                        if (isset($value['action'])) {
                            call_user_method($value['action'] . 'Action', $controller);
                        } else {
                            $controller->indexAction();
                        }
                    }
                } else {
                    throw new Exception("Kontroler nie istnieje ");
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
