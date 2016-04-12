<?php
include_once 'Framework/Autoloader/Autoloader.php';

$loader = new AutoLoader();
$loader->init();

$bootstrap = new Modules\Bootstrap();

class test {
    public function xd(){
        echo 'xd';
    }
}

class jasiek {
    public function jas(){
        echo 'b labla';
    }
}

$em = new Framework\Events\EventManager();

$event = new Framework\Events\Event();

$event->setKey('xd');
$event->setObject(new test());
$event->setMethod('xd');

$em->attachEvent($event);

$event1 = new Framework\Events\Event();

$event1->setKey('jasiek');
$event1->setMethod('jas');
$event1->setObject(new jasiek());

$em->attachEvent($event1);

$bootstrap->setEventManager($em);

$bootstrap->startApplication($_SERVER['REQUEST_URI']);

?>