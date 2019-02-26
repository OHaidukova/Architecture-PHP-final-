<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 21:29
 */

namespace Service\Product;

use Model;
use Framework\Registry;

class PurchasesProduct extends Decorator
{
    public function getInfo(int $id): ?Model\Entity\Product
    {
        $count = 0;

        $product = $this->product->getInfo($id);
        foreach(($this->getOrderRepository()->search([$id]))[0] as $item) {
        $count = $count + $item['count'];
    };

        if($product && $count > 0){
            $product->setPurchases($count);
        };

        return $product ? $product : null;
    }

    protected function getOrderRepository(): Model\Repository\OrderDetails
    {
        return new Model\Repository\OrderDetails();
    }
}