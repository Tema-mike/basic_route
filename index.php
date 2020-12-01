<?php
error_reporting(E_ALL);

require_once('configuration/database.php');
require_once('configuration/constants.php');

// Data Base connection
$dbObject = mysqli_connect(DB_host, DB_user, DB_pass, DB_name);

// Connect Core
require('core.php');

// Require Router, Base controller and template
require('classes/Router.php');
require('classes/Controller_Base.php');
require('classes/Template.php');

//Connect Router
$router = new Router($registry);

$registry->set('router', $router);
$router->setPath(SITE_PATH . 'controllers');

$router->start();
