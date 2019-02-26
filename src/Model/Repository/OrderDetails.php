<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 20:54
 */

namespace Model\Repository;


class OrderDetails
{

    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        foreach ($ids as $item) {
            $productList[] = $this->getOrderDetails(['product_id' => $item]);
        }

        return $productList;
    }

    private function getOrderDetails($search = [])
    {
        $orders = [];

        $data = [
            [
                'id' => 1,
                'order_id' => 1,
                'product_id' => 1,
                'count' => 10
            ],
            [
                'id' => 2,
                'order_id' => 1,
                'product_id' => 10,
                'count' => 1
            ],
            [
                'id' => 3,
                'order_id' => 2,
                'product_id' => 10,
                'count' => 6
            ]
        ];

        if (!count($search)) {
            return $data;
        };

        foreach ($data as $item) {
            if($item[key($search)] == $search[key($search)]) {
                $orders[] = $item;
            }
        };

        return $orders;
    }
}