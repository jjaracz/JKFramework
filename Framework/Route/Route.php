<?php

namespace Framework\Route;

class Route {
    protected $controller;
    protected $action;
    protected $additionalData;
    
    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->name;
    }

    public function getAdditionalData() {
        return $this->additionalData;
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setAdditionalData(array $additionalData) {
        $this->additionalData = $additionalData;
    }
}

