<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/02/2019
 * Time: 21:32
 */

namespace Model\Repository;


class Storage
{

    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }
        $productList = [];
        foreach ($ids as $item) {

            $productList[] = $this->getStorage(['id' => $item]);
        }
        return $productList;
    }
    private function getStorage($search = [])
    {
        $orders = [];
        $data = [
            [
                'id' => 1,
                'date' => '2019-12-31'
            ],
            [
                'id' => 2,
                'date' => '2019-01-01'
            ],
            [
                'id' => 3,
                'date' => '2019-01-01'
            ],
            [
                'id' => 4,
                'date' => '2019-01-01'
            ],
            [
                'id' => 5,
                'date' => '2019-01-01'
            ],
            [
                'id' => 8,
                'date' => '2019-01-01'
            ],
            [
                'id' => 9,
                'date' => '2019-12-31'
            ],
            [
                'id' => 10,
                'date' => '2019-01-01'
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