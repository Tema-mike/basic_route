<?php


class Model_Product extends Model_Base {
    public $id_prod;
    public $name_prod;
    public $color_prod;
    public $material_prod;
    public $brand_prod;
    public $photo_prod;
    public $country_prod;
    public $prise_prod;

    public function tableFields(){
        return array(
            'Id' => $this->id_prod,
            'Name' => $this->name_prod,
            'Color' => $this->color_prod,
            'Material' => $this->material_prod,
            'Brand' => $this->brand_prod,
            'Photo' => $this->photo_prod,
            'Country' => $this->country_prod,
            'Price' => $this->prise_prod
        );
    }

    public function constructSelect(){
        $select = array(
            'chooseParam' => '',
        );

        // ------------------- SELECT WHERE Construct --------------------- //
        // ---------------------------------------------------------------- //

        // ---------------- SEARCH ---------------- //
        if (!empty($_POST['search'])){
            unset($select['WHERE']);
            $select['WHERE'] = "Name LIKE '%{$_POST['search']}%'";
        }

        // ---------------- FILTERS -------------- //
        if ((isset($_POST['arrPrice'])) OR (isset($_POST['arrColor'])) OR (isset($_POST['arrBrand'])) OR (isset($_POST['arrMaterials'])) OR (isset($_POST['arrCountry']))) {
            $arrPrice = $_POST['arrPrice'] ? explode(' ', trim($_POST['arrPrice'])) : [];
            $arrColor = $_POST['arrColor'] ? explode(' ', trim($_POST['arrColor'])) : [];
            $arrBrand = $_POST['arrBrand'] ? explode(' ', trim($_POST['arrBrand'])) : [];
            $arrMaterial = $_POST['arrMaterial'] ? explode(' ', trim($_POST['arrMaterial'])) : [];
            $arrCountry = $_POST['arrCountry'] ? explode(' ', trim($_POST['arrCountry'])) : [];

            if ((count($arrPrice) > 0) OR (count($arrColor) > 0) OR (count($arrBrand) > 0) OR (count($arrMaterial) > 0) OR (count($arrCountry) > 0)) {
                $select['WHERE'] = '';
                $selectStr = '';
                $selectStr1 = '';
                $selectStr2 = '';
                $selectStr3 = '';
                $selectStr4 = '';

                if (count($arrPrice) > 0) {

                    if (in_array('price-s', $arrPrice)) {
                        $selectStr .= '(Price BETWEEN 1 AND 100) OR ';
                    }
                    if (in_array('price-m', $arrPrice)) {
                        $selectStr .= '( Price BETWEEN 101 AND 300) OR ';
                    }
                    if (in_array('price-l', $arrPrice)) {
                        $selectStr .= '(Price BETWEEN 301 AND 500) OR ';
                    }
                    if (in_array('price-xl', $arrPrice)) {
                        $selectStr .= 'Price > 500 OR ';
                    }
                    $selectStr =mb_substr($selectStr, 0, -4) . " AND ";
                }

                if (count($arrColor) > 0) {
                    $arrColor = "'" . implode("', '", $arrColor) . "'";
                    $selectStr1 = "Color IN ({$arrColor}) AND ";
                }

                if (count($arrBrand) > 0) {
                    $arrBrand = "'" . implode("', '", $arrBrand) . "'";
                    $selectStr2 = "Brand IN ({$arrBrand}) AND ";
                }

                if (count($arrMaterial) > 0) {
                    $arrMaterial = "'" . implode("', '", $arrMaterial) . "'";
                    $selectStr3 = "Material IN ({$arrMaterial}) AND ";
                }

                if (count($arrCountry) > 0) {
                    $arrCountry = "'" . implode("', '", $arrCountry) . "'";
                    $selectStr4 = "Country IN ({$arrCountry}) AND ";
                }

                $select['WHERE'] .= $selectStr . $selectStr1 . $selectStr2 . $selectStr3 . $selectStr4;
                $select['WHERE'] = mb_substr($select['WHERE'], 0, -5);
            }
        }

        // ------------------- SELECT ORDER Construct ------------------ //
        // ------------------------------------------------------------- //



        if (!empty($_POST['sort'])){
            $select['ORDER'] = "Price {$_POST['sort']}";
        }

        return $select;
    }
}