<?php
header('Access-Control-Allow-Origin: *');

class Controller_Index extends Controller_Base {
    public $layouts = "first_L";

    function index() {
        $this->template->view('Home');
    }


    function filters(){
        require_once ('models/Model_Product.php');

        $model = new Model_Product();
        $select = $model->constructSelect();
        $dataResult = json_encode($model->selectRows($select));
        if (!isset($dataResult)){
            $dataResult = 'Нет результатов по данному запросу.';
        }
        echo $dataResult;
    }

}