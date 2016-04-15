<?php

namespace Framework\Mvc\Controller;

use Framework\Events\AbstractEventManager;
use Framework\Mvc\Controller\ControllerInterface;

abstract class AbstractController implements ControllerInterface {
    protected $extensions = Array();
    
    public abstract function indexAction();
    
    public function appendExtension($extension){
        
    }
    
    public function createViewModel(){
        
    }
}