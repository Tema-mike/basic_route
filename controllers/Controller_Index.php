<?php


class Controller_Index extends Controller_Base {
    public $layouts = "first_L";

    //action
    function index() {
        $this->template->view('Home');
        $model = new Model_Product();
        $select = $model->constructSelect();
        $model->selectRows($select);
    }

    //Building sql query
    function filters(){



    }

}