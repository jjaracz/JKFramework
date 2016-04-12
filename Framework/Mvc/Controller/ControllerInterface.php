<?php

namespace Framework\Mvc\Controller;

use Framework\Events\AbstractEventManager as EventManager;

interface ControllerInterface {
    public function setEventManager(EventManager $em);
    public function getEventManager();
}