<?php


abstract class Model_Base {
    protected $db;
    protected $table;
    private $dataResult;

    public function __construct(){
        // Connection object
        global $dbObject;
        $this->db = $dbObject;

        // Name of the table
        $modelName = get_class($this);
        $arrExp = explode('_', $modelName);
        $tableName = mb_strtolower($arrExp[1]);
        $this->table = $tableName;
    }

    //SELECT
    public function selectRows($select){
        $sqlSelect = $this->caseSelect($select);
        try {
            $db = $this->db;
            $stmt = $db->query($sqlSelect);
            $rows = $stmt->fetchAll();
            $this->dataResult = $rows;
            return $this->dataResult;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // INSERT Query for using in models
    public function insertRow(){
        $arrAllFields = array_keys(tableFields());
        $arrSetFields = array();
        $arrData = array();

        foreach ($arrAllFields as $field){
            if (!empty($this->$field)){
                $arrSetFields[] = $field;
                $arrData[] = $this->$field;
            }
        }
        $fieldsQuery = implode(', ', $arrSetFields);
        $arrPlace = array_fill(0, count($arrSetFields), '?');
        $forData = implode(', ', $arrPlace);

        // Use construction 'try - catch' for protecting
        // query and catching errors.
        try {
            $db = $this->db;
            $stmt = $db->prepare("INSERT INTO" . $this->table . "SET" . "(" . $fieldsQuery . ") VALUES (" . $forData . ")");
            $result = $stmt->execute($arrData);
        } catch (PDOException $e){
            echo 'Error : ' . $e->getMessage();
            echo '<br>Error sql : ' . "'INSERT INTO $this->table ($fieldsQuery) values ($forData)'";
            exit();
        }
        return $result;
    }

    //DELETE

    //UPDATE

    //SELECT query variants
    private function caseSelect($select){
        $allQuery = array_keys($select);
        $choseParam = "*";

        //Choose one or more columns for select
        if (!empty($select['chooseColumn'])){
            $choseParam = $select['chooseColumn'];
        }

        $sqlSelect ="SELECT" . $choseParam . "FROM " . $this->table;

        //---------- Cases of conditions ----------//
        //WHERE
        if (in_array('WHERE', $allQuery)){
            foreach ($select as $key => $val){
                if (mb_strtoupper($key) == 'WHERE'){
                    $sqlSelect .= "WHERE" . $val;
                }
            }
        }
        //GROUP
        if (in_array('GROUP', $allQuery)){
            foreach ($select as $key => $val){
                if (mb_strtoupper($key)){
                    $sqlSelect .= "GROUP BY" . $val;
                }
            }
        }
        //ORDER
        if (in_array('ORDER', $allQuery)){
            foreach ($select as $key => $val){
                if (mb_strtoupper($key)){
                    $sqlSelect .= "ORDER BY" . $val;
                }
            }
        }
        //LIMIT
        if (in_array('LIMIT', $allQuery)){
            foreach ($select as $val){
                if (mb_strtoupper($key)){
                    $sqlSelect .= "LIMIT" . $val;
                }
            }
        }
        return $sqlSelect;
    }
}