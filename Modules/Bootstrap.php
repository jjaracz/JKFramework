<?php

namespace Modules;

use Framework\Bootstrap\AbstractBootstrap;

class Bootstrap extends AbstractBootstrap {
    public function startApplication($request){
        $this->getEventManager()->callEvents();
    }   
}