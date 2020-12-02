<?php


class Controller_Index extends Controller_Base {
    public $layouts = "first_L";

    //action
    function index() {
        $this->template->view('Home');
    }

    //Building sql query
    function filters(){
        require_once ('models/Model_Product.php');
        $model = new Model_Product();
        $select = $model->constructSelect();
        $dataResult = json_encode($model->selectRows($select));
        echo $dataResult;
    }

}