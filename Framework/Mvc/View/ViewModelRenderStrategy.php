<?php

namespace Framework\Mvc\View;

use Framework\Mvc\View\AbstractRenderStrategy;
use Framework\Mvc\Model\AbstractViewModel;

class ViewModelRenderStrategy extends AbstractRenderStrategy { 
    private $layout;
    private $data;
    private $content;
    
    public function render(AbstractViewModel $viewModel) {
        if(!$this->layout){
            $this->setLayout($this->config['layout']);
        }
        
        $this->data = $viewModel->getData();
        
        $this->loadContent($viewModel->getTemplate());
        
        include $this->layout;
    }
    
    public function setLayout($layout){
        $this->layout = $layout;
    }
    
    public function loadContent($template){
        $split = explode("/",$template);
        
        foreach($this->config['templates'][$split[0]] as $key => $value){
            if($key === $split[1]){
                $this->content = $this->requireToVar($this->config['path'].'/'.$value);
            }
        }
    }
    
    public function requireToVar($file){
        ob_start();
        require($file);
        return ob_get_clean();
    }
} 
