<?php
    return array(      
        'controller' => array(
            'DefaultFactory' => 'Framework\Mvc\Controller\Factory\DefaultControllerFactory',
            'controllers_pre' => 'Modules\Application\Controllers',
            'controllers' => array(
                'IndexController' => 'IndexController'
            ),
            'url_pre' => '/JKFramework/',
        ),
        'route' => array(
            'default' => array(
                'controller' => 'IndexController',       
                'name' => '/',
            ),
            'ddes' => array(
                'controller' => 'IndexController',
                'action' => 'index',
                'name' => 'dde',
                'data' => array(
                    'id' => 'number'
                )
            )
        ),
        'view' => array(
            'layout' => 'Modules/Application/Views/Layout/Layout.phtml',
            'path' => 'Modules/Application/Views',
            'templates' => array(
                'index' => array(
                    'index' => 'index/index.phtml'
                )
            )
        )
    );
?>