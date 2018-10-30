<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    
	$routes->connect('/', ['controller' => 'Registrations', 'action' => 'login', 'home']);
	$routes->fallbacks(DashedRoute::class);
	
	Router::prefix('api', function ($routes) {
		$routes->setExtensions(['json', 'xml']);
		$routes->fallbacks('InflectedRoute');
	});
});
