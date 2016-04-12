<?php
include_once 'Framework/Autoloader/Autoloader.php';

$loader = new AutoLoader();
$loader->init();

$bootstrap = new Modules\Bootstrap();

$bootstrap->startApplication($_SERVER['REQUEST_URI']);
?>