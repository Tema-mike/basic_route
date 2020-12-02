<?php
error_reporting(E_ALL);

require_once('configuration/database.php');
require_once('configuration/constants.php');

// Data Base connection
$dsn = "mysql:host=" . DB_host . ";dbname=" . DB_name;
$dbObject = new PDO( $dsn, DB_user, DB_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Connect Core
require('core.php');

// Require Router, Base controller and template
require('classes/Router.php');
require('classes/Controller_Base.php');
require('classes/Template.php');
require ('classes/Model_Base.php');

//Connect Router
$router = new Router($registry);

$registry->set('router', $router);
$router->setPath(SITE_PATH . 'controllers');

$router->start();
