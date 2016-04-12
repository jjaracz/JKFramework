<?php

namespace Framework\Mvc\Controller\Factory;

use Framework\Mvc\Controller\Factory\ControllerFactoryInterface;
use \ReflectionClass as Reflection;

abstract class AbstractControllerFactory implements ControllerFactoryInterface {
    protected $factory;

    public function setFactory($factory) {
        $reflection = new Reflection($this->factory);

        if ($reflection->implementsInterface(ControllerFactoryInterface::class)) {
            throw new Exception("Błąd z interfejsem");
        }

        $this->factory = $factory;
    }

    public function create($key) {
        return $this->factory->create($key);
    }
}
