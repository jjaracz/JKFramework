<?php

namespace Framework\Mvc\View;

use Framework\Mvc\View\AbstractRenderStrategy;
use Framework\Mvc\Model\AbstractViewModel;

class JsonModelRenderStrategy extends AbstractRenderStrategy { 
    public function render(AbstractViewModel $viewModel) {
        echo $viewModel->encode();
    }
}