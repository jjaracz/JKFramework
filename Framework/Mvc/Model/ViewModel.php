<?php

namespace Framework\Mvc\Model;

use Framework\Mvc\Model\AbstractViewModel;

class ViewModel extends AbstractViewModel {
    protected $template;

    public function getTemplate() {
        return $this->template;
    }

    public function setTemplate($template) {
        $this->template = $template;
    }
}
