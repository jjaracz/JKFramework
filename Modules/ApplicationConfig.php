<?php
    return array(
        'controller' => array(
            'DefaultFactory' => 'Framework\Mvc\Controller\Factory\DefaultControlleryFactory',
            'controllers_pre' => 'Modules\Application\Controllers',
            'controllers' => array(
                'IndexController' => 'IndexController'
            ),
            'url_pre' => '/JKFramework/'
        ),
        'route' => array(
            'default' => array(
                'controller' => 'IndexController',
                'action' => '',
                'name' => '/'
            )
        )
    )
?>