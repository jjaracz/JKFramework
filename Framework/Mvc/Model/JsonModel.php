<?php

namespace Framework\Mvc\Model;

use Framework\Mvc\Model\AbstractViewModel;

class JsonModel extends AbstractViewModel {
    public function encode(){
        return json_encode($this->getData());
    }
}

