<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/02/2019
 * Time: 21:37
 */

namespace Service\Order;

use Builders\BasketBuilder;

class CheckoutProcess
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function __construct(BasketBuilder $basketBuilder)
    {
        $this->billing = $basketBuilder->getBilling();
        $this->discount = $basketBuilder->getDiscount();
        $this->communication = $basketBuilder->getCommunication();
        $this->security = $basketBuilder->getSecurity();
    }

    public function checkout($productsInfo) {
        $totalPrice = 0;
        foreach ($productsInfo as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }

}
