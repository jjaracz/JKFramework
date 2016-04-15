<?php

namespace Framework\Mvc\View;

use Framework\Mvc\Model\AbstractViewModel;
use Framework\Mvc\View\AbstractRenderStrategy;
use Framework\Mvc\Model\ViewModel;
use Framework\Mvc\View\ViewModelRenderStrategy;

class PageRenderer {
    private $renderStrategy;
    private $viewConfig;
    
    public function getRenderStrategy() {
        return $this->renderStrategy;
    }

    public function setRenderStrategy(AbstractRenderStrategy $renderStrategy) {
        $this->renderStrategy = $renderStrategy;
    }
      
    public function render(AbstractViewModel $viewModel){
        if($viewModel instanceof ViewModel){
            $this->setRenderStrategy(new ViewModelRenderStrategy($this->viewConfig));
            $this->getRenderStrategy()->render($viewModel);
        }
    }
    
    public function __construct(array $viewConfig) {
       $this->viewConfig = $viewConfig;
    }
}