<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/02/2019
 * Time: 21:35
 */

namespace Builders;

use Service\Billing\IBilling;
use Service\Discount\IDiscount;
use Service\Communication\ICommunication;
use Service\User\ISecurity;
use Service\Order\CheckoutProcess;

class BasketBuilder
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function setBilling(IBilling $billing)
    {
        $this->billing = $billing;
        return $this;
    }

    public function getBilling(): IBilling
    {
        return $this->billing;
    }

    public function setDiscount(IDiscount $discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function getDiscount(): IDiscount
    {
        return $this->discount;
    }

    public function setCommunication(ICommunication $communication)
    {
        $this->communication = $communication;
        return $this;
    }

    public function getCommunication(): ICommunication
    {
        return $this->communication;
    }

    public function setSecurity(ISecurity $security)
    {
        $this->security = $security;
        return $this;
    }

    public function getSecurity(): ISecurity
    {
        return $this->security;
    }

    public function build(): CheckoutProcess
    {
        return new CheckoutProcess($this);
    }
}
