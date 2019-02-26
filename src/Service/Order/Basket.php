<?php

declare(strict_types = 1);

namespace Service\Order;

use Model;
use Service\Billing\Card;
use Service\Billing\IBilling;
use Service\Communication\Email;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\Discount\NullObject;
use Service\User\ISecurity;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Service\Order\CheckoutProcess;
use Builders\BasketBuilder;
use Framework\Registry;
use Model\Repository\ProductMapper;

class Basket
{
    /**
     * Сессионный ключ списка всех продуктов корзины
     */
    private const BASKET_DATA_KEY = 'basket';

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * Добавляем товар в заказ
     *
     * @param int $product
     *
     * @return void
     */
    public function addProduct(int $product)
    {
        $result = Registry::get('TransactionAdd')->addProduct($product, $this->session);
        return $result;
    }

    /**
     * Проверяем, лежит ли продукт в корзине или нет
     *
     * @param int $productId
     *
     * @return bool
     */
    public function isProductInBasket(int $productId): bool
    {
        return in_array($productId, $this->getProductIds(), true);
    }

    /**
     * Получаем информацию по всем продуктам в корзине
     *
     * @return Model\Entity\Product[]
     */
    public function getProductsInfo(): array
    {
        $productIds = $this->getProductIds();
        return (new ProductMapper())->search($productIds);
    }


    public function checkout(): void
    {
        $builder = (new BasketBuilder())
            ->setBilling(new Card())
            ->setDiscount(new NullObject())
            ->setCommunication(new Email())
            ->setSecurity(new Security($this->session));

        $productsInfo = $this->getProductsInfo();

        $checkOut = $builder->build();
        $checkOut->checkout($productsInfo);
    }

    /**
     * Получаем список id товаров корзины
     *
     * @return array
     */
    private function getProductIds(): array
    {
        return $this->session->get(static::BASKET_DATA_KEY, []);
    }
}
