<?php

declare(strict_types = 1);

namespace Model\Repository;


class Product
{
    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    public function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            ]
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };
        return array_filter($dataSource, $productFilter);
    }

}
