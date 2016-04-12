<?php

namespace Framework\Events;

use Framework\Events\Event;

interface EventManagerInterface {
    public function attachEvent(Event $event);
    public function getEvent();
    public function setEvent(Event $event);
    public function callEvent($eventKey);
}
