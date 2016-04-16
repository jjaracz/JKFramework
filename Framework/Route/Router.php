<?php

namespace Framework\Route;

class Router {

    protected $data;
    protected $pre;
    protected $routeConfig;
    protected $request;
    protected $urlPre;
    protected $additionalData;
    private static $instance;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public function parseRoute($request) {
        $this->request = $request;

        $basePath = (isset($this->pre)) ? $this->pre : "";
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

        $this->additionalData = $additionalData;

        $controllerc = (!empty($controller)) ? $controller : "/";

        return array('controller' => $controllerc, 'method' => $method);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    public function setRouteConfig($config) {
        $this->routeConfig = $config;

        $this->reparse();
    }

    private function reparse() {
        $i = 0;
        if (!empty($this->routeConfig['data'])) {

            foreach ($this->routeConfig['data'] as $key => $value) {
                if ($value === 'number') {
                    $this->data[$key] = (int) $this->additionalData[$i];
                } else {
                    $this->data[$key] = $this->additionalData[$i];
                }

                $i++;
            }
        }
    }

    public function setUrlPre($pre) {
        $this->pre = $pre;
    }

    public function getFromRoute($key, $default = 0) {
        if (isset($this->data[$key])) {
            if (!empty($this->data[$key])) {
                return $this->data[$key];
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }

}
