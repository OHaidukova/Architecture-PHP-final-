<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30/01/2019
 * Time: 22:24
 */

namespace Service\Compare;


use Model\Entity\Product;

class PriceCompare implements ICompare
{

    public function compare(Array $array): array
    {
        usort( $array, function(Product $a, Product $b ){
            if($a->getPrice() == $b->getPrice()) return 0;
            return $a->getPrice() > $b->getPrice() ? 1 : -1;
        }
        );
        return $array;
    }
}