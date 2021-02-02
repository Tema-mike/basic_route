<?php

/* ------------------------------------------------------ */
/* --- This File require some controllers and models ---- */
/* ------------ by their name of class. ----------------- */
/* ------------------------------------------------------ */

function getClass($className) {
    $fileName = strtolower($className) . ".php";
    $expArr = explode('_', $className);

    if ((empty($expArr[1])) || ($expArr[1] == 'Base')) {
        $folder = 'classes';
    } else {
        switch($expArr[0]){
            case 'controller':
                $folder = 'controllers';
                break;
            case 'model':
                $folder = 'models';
                break;
        }
    }


    $file = SITE_PATH . $folder . DS . $fileName;

    require_once ($file);
}

// Start Registry
$registry = new Registry();
