<?php

namespace Framework\Mvc\View;

use Framework\Mvc\Model\AbstractViewModel;

abstract class AbstractRenderStrategy {    
    protected $config;
    
    public abstract function render(AbstractViewModel $viewModel); 
    public function __construct(array $config) {
        $this->config = $config;
    }
}