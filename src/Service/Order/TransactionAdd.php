<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/02/2019
 * Time: 21:29
 */

namespace Service\Order;

use Model;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class TransactionAdd
{
    /**
     * Сессионный ключ списка всех продуктов корзины
     */
    private const BASKET_DATA_KEY = 'basket';



    public function addProduct(int $id, SessionInterface $session)
    {
        $productInfo = $this->getProductStorage($id);

        if ($productInfo === [] || date_create($productInfo['date']) < date_create(date('Y-m-d'))) {
            return false;
        } else {
            $this->addInBasket($id, $session);
            return true;
        }
    }



    public function getProductStorage(int $id)
    {
        $data = ($this->getStorageRepository()->search([$id]))[0];
        return $data[0];
    }



    public function addInBasket(int $id, SessionInterface $session)
    {
        $basket = $session->get(static::BASKET_DATA_KEY, []);

        if (!in_array($id, $basket, true)) {
            $basket[] = $id;
            $session->set(static::BASKET_DATA_KEY, $basket);
        }
    }



    protected function getStorageRepository(): Model\Repository\Storage
    {
        return new Model\Repository\Storage();
    }
}