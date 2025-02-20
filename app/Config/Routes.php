<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::kraj');
$routes->get('kraj', 'Main::kraj');
#$routes->get('kraj/(:num)', 'Main::okres/$1');
$routes->get('kraj/(:num)/perpage/(:num)', 'Main::okres/$1/$2');


