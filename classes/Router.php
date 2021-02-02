<?php

/* --------------------------------------------- */
/* ---- This class - Router identifies what ---- */
/* ------ Controller and action we'll use ------ */
/* --------------------------------------------- */

class Router {

    // Identification of path to folder with controllers
    public function setPath ($path){
        $path = trim($path, '/\\');
        $path .= DS;

        if (is_dir($path) == false) {
            throw new Exception("This is invalid controller's path:" . $path);
        }

        $this->path = $path;
    }

    //Identification of controller and action
    private function getController(&$file, &$controller, &$action, &$args) {
        $route = (empty($_GET['route']) ? '' : $_GET['route']);

        if (empty($route)) {
            $route = 'index';
        }

        // Get URL's parts
        $route = trim($route, '/\\');
        $parts = explode('/', $route);

        // Find controller
        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $part = ucfirst($part);
            $fullpath = $cmd_path . "Controller_" . $part;

            // Check the folder
            if (is_dir($fullpath)) {
                $cmd_path .= $part . DS;
                array_shift($parts);
                continue;
            }

            // Find the file
            if (is_file($fullpath . ".php")) {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }


        // If the controller not found in URL, use 'index'
        if (empty($controller)) {
            $controller = 'index';
        }

        // Get the action
        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'index';
        }
        $file = $cmd_path . 'Controller_' . $controller . ".php";
        $args = $parts;
    }

    public function start() {
        $this->getController($file, $controllrer, $action, $args);

        if (is_readable($file) == false){
            die('404 Not Found Controller');
        }

        require_once($file);

        //Create Controller's object
        $class = 'Controller_' . $controllrer;
        $controller = new $class();

        //if action not found - Error 404
        if (is_callable(array($controller, $action)) == false){
            die('404 Not Found Action');
        }

        //Complete the action
        $controller->$action();
    }
}