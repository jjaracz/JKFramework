<?php

namespace Framework\Mvc\Model;

abstract class AbstractViewModel {

    protected $data = array();

    public function add($key, $value) {
        $this->data[$key] = $value;
    }

    public function addMultiple(array $values) {
        foreach ($values as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function getData() {
        return (object) $this->data;
    }
}
