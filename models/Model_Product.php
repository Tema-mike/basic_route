<?php


class Model_Product extends Model_Base {
    public $id_prod;
    public $name_prod; // for search
    public $color_prod;  // white / black / red / green / multicolor
    public $material_prod; //
    public $brand_prod; //brand 1 / brand 2 / brand 3
    public $photo_prod; //path to photo
    public $country_prod; // Russia / USA / UK / German / China
    public $prise_prod; // between 1 and 100 y.e.

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
            'chooseParam' => ''
        );
        if (($_POST['arrPrice'] !== NULL) OR ($_POST['arrColor'] !== NULL) OR ($_POST['arrBrand'] !== NULL) OR ($_POST['arrMaterials'] !== NULL) OR ($_POST['arrCountry'] !== NULL)){
            $arrPrice = explode(' ', $_POST['arrPrice']);
            $arrColor = explode(' ', $_POST['arrColor']);
            $arrBrand = explode(' ', $_POST['arrBrand']);
            $arrMaterial = explode(' ', $_POST['arrMaterial']);
            $arrCountry = explode(' ', $_POST['arrCountry']);

            $select['WHERE'] = '';
            $selectStr = '';
            $selectStr1 = '';
            $selectStr2 = '';
            $selectStr3 = '';
            $selectStr4 = '';
            if (count($arrPrice) > 0){
                $selectStr .= 'Price ';

                if (in_array( 'price-s',$arrPrice)){
                    $selectStr .= 'BETWEEN 1 AND 100 AND';
                }
                if (in_array( 'price-m',$arrPrice)){
                    $selectStr .= 'BETWEEN 101 AND 300 AND';
                }
                if (in_array( 'price-l',$arrPrice)){
                    $selectStr .= 'BETWEEN 301 AND 500 AND';
                }
                if (in_array( 'price-xl',$arrPrice)){
                    $selectStr .= ' > 500 AND';
                }

            }

            if (count($arrColor) > 0){
                foreach ($arrColor as $key => $val){
                    $selectStr1 .= 'Color = ' . $val . ' AND';
                }
            }

            if (count($arrBrand) > 0){
                foreach ($arrBrand as $key => $val){
                   $selectStr2 = 'Brand = ' . $val . ' AND';
                }
            }

            if (count($arrMaterial) > 0){
                foreach ($arrMaterial as $key => $val){
                    $selectStr3 = 'Material = ' . $val . ' AND';
                }
            }

            if (count($arrCountry) > 0){
                foreach ($arrCountry as $key => $val){
                    $selectStr4 = 'Material = ' . $val . ' AND';
                }
            }
            $select .= $selectStr . $selectStr1 . $selectStr2 . $selectStr3 . $selectStr4;
            $select = mb_substr($select, 0, -4);
        }



        return $select;
    }
}