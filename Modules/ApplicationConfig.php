<?php
    return array(
        'controller' => array(
            'DefaultFactory' => 'Framework\Mvc\Controller\Factory\DefaultControllerFactory',
            'controllers_pre' => 'Modules\Application\Controllers',
            'controllers' => array(
                'IndexController' => 'IndexController'
            ),
            'url_pre' => '/sp/JKFramework/'
        ),
        'route' => array(
            'default' => array(
                'controller' => 'IndexController',
                'action' => 'index',
                'name' => '/'
            )
        )
    )
?>