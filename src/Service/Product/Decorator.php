<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 21:22
 */

namespace Service\Product;


abstract class Decorator implements IProduct
{
    protected $product = null;

    public function __construct(IProduct $product)
    {
        $this->product = $product;
    }
}