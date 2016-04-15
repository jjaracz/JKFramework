<?php

namespace Modules\Application\Controllers;

use Framework\Mvc\Controller\AbstractController;
use Framework\Mvc\Model\ViewModel;

class IndexController extends AbstractController {
    public function indexAction() {
        $view = new ViewModel();
        
        $view->add('test', 'test');
        
        $view->setTemplate('index/index');
        
        return $view;
    }
}
