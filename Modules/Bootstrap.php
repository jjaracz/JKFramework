<?php

namespace Modules;

use Framework\Bootstrap\AbstractBootstrap;
use Framework\Route\RouteListener;
use Framework\Mvc\View\PageRenderer;

class Bootstrap extends AbstractBootstrap {
    public function startApplication($request){
        $eventManager = $this->getEventManager();
        
        if(!empty($eventManager->getEvents())){
            $this->getEventManager()->callEvents();
        }
        
        $config = include_once 'Modules/ApplicationConfig.php';
        
        $routeListener = new RouteListener($config['controller'],$config['route']);
        $viewModel = $routeListener->listen($request);
        
        $pageRenderer = new PageRenderer($config['view']);
        $pageRenderer->render($viewModel);
    }   
}