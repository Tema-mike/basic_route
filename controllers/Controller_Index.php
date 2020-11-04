<?php


class Controller_Index extends Controller_Base {
    public $layouts = "first_L";

    //action
    function index() {
        $this->template->view('Home');
    }

}