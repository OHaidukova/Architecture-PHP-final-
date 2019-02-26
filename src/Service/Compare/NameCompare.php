<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29/01/2019
 * Time: 23:08
 */

namespace Service\Compare;


use Model\Entity\Product;

class NameCompare implements ICompare
{

    public function compare(Array $array): array
    {
        usort( $array, function(Product $a, Product $b ){
            return strcasecmp($a->getName(), $b->getName());
            }
        );
        return $array;
    }
}