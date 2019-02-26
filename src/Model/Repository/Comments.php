<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25/02/2019
 * Time: 21:41
 */

namespace Model\Repository;


class Comments
{
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }
        $productList = [];
        foreach ($ids as $item) {

            $productList[] = $this->getDataFromSource(['product_id' => $item]);
        }
        return $productList;
    }

    public function getDataFromSource(array $search = [])
    {
        $comments = [];
        $dataSource = [
            [
                'id' => 1,
                'product_id' => 1,
                'text' => 'The best course!',
            ],
            [
                'id' => 1,
                'product_id' => 1,
                'text' => 'Good material.',
            ],
            [
                'id' => 1,
                'product_id' => 2,
                'text' => 'Very interesting.',
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        };
        foreach ($dataSource as $item) {
            if($item[key($search)] == $search[key($search)]) {
                $comments[] = $item;
            }
        };

        return $comments;
    }
}