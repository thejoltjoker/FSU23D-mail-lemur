<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "Home::index");

$routes->get("/login", "Login::index");
// $routes->get("/logout", "Login::index"); //TODO
$routes->get("/signup", "SignUp::index"); //TODO
$routes->get("/newsletters", "Newsletters::index"); //TODO
// $routes->get("/my-newsletters", "Login::index"); //TODO
