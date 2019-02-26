<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 31/01/2019
 * Time: 00:02
 */

namespace Service\Compare;

use Framework\Registry;

class SortStrategy
{


    public function sort(Array $array, $type): array
    {
        $nameCompare = Registry::get('NameCompare');
        $priceCompare = Registry::get('PriceCompare');

        $type == 'price' ? $array = $priceCompare->compare($array) : $array = $nameCompare->compare($array);
        return $array;
    }
}