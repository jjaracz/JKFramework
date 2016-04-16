<?php

namespace Modules\Application\Controllers;

use Framework\Mvc\Controller\AbstractController;
use Framework\Mvc\Model\JsonModel;

class IndexController extends AbstractController {
    public function indexAction() {
        $view = new JsonModel();
        
        $view->add('test', 'test');
        
        return $view;
    }
}
