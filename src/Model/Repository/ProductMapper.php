<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24/02/2019
 * Time: 11:15
 */

namespace Model\Repository;
use Model;
use Model\Entity;
use Maps\IdentityMap;

class ProductMapper extends Repository
{
    protected $identityMap;

    public function __construct()
    {
        $this->identityMap = IdentityMap::getIdentityMap();
    }

    /**
     * Фабричный метод для репозитория Product
     *
     * @return Model\Repository\Product
     */
    public function getRepositoryObject()
    {
        return new Model\Repository\Product();
    }

    /**
     * Поиск продуктов по массиву id
     *
     * @param int[] $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        $product = new Entity\Product();

        $newArrayId = [];

        foreach ($ids as $id) {
            try{
                $entity = $this->identityMap->getMap('Model\Entity\Product', $id);
                $productList[] = $entity;
            } catch (\Exception $e) {
                $newArrayId[] = $id;
            }

        }

        foreach ($this->getByParams(['id' => $newArrayId]) as $item) {
            $clone = clone $product;
            $clone->setData($item['id'], $item['name'], $item['price']);

            $productList[] = $clone;
            $this->identityMap->add($clone);
        }

        return $productList;
    }

    /**
     * Получаем все продукты
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $productList = [];
        $product = new Entity\Product();

        foreach ($this->getByParams($search = []) as $item) {
            $clone = clone $product;
            $clone->setData($item['id'], $item['name'], $item['price']);
            $productList[] = $clone;

        }
        return $productList;
    }

}