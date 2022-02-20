<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('login', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'UserController', 'method'=>'index'),array()));