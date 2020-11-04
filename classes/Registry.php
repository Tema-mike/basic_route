<?php

/* -------------------------------------------- */
/* -------- This class is registry for -------- */
/* -------- different information. You -------- */
/* -------- can use this for middle ware ------ */
/* -------- for example. -----------------------*/


class Registry {
    private $vars = array();

    //Set data
    public function set($key, $var) {
        if (isset($this->vars[$key]) == true) {
            throw new Exception('Unable to set var' . $key);
        }

        $this->vars[$key] = $var;
        return true;
    }

    //Get data
    public function get($key) {
        if (isset($this->vars[$key]) == false) {
            return null;
        }
        return $this->vars[$key];
    }

    //Remove data
    public function remove($var) {
        unset ($var);
    }
}