<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 21:05
 */

namespace Service\Product;

use Model;

interface IProduct
{
    public function getInfo(int $id): ?Model\Entity\Product;
}