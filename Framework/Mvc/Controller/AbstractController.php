<?php

namespace Framework\Mvc\Controller;

use Framework\Events\AbstractEventManager;
use Framework\Mvc\Controller\ControllerInterface;
use Framework\Route\Router;

abstract class AbstractController implements ControllerInterface {
    private $extensions = Array();
    private $router;
    
    public abstract function indexAction();
    
    public function createViewModel(){
        
    }
    
    public function getRouter(){
        if(!$this->router){
            $this->router = Router::getInstance();
        }
        return $this->router;
    }
}