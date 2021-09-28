<?php

namespace Order\DiscountMicroservice\Context;

use Order\DiscountMicroservice\Model\Order;
use Order\DiscountMicroservice\Strategy\CategoryBasedDiscount;
use Order\DiscountMicroservice\Strategy\CustomerBasedDiscount;

/**
 * Class OrderDiscount
 * @package Order\DiscountMicroservice
 */
class OrderDiscount
{
    /**
     * @var
     */
    private $strategy;

    /**
     * OrderDiscount constructor.
     * @param string $type
     */
    public function __construct(string $type = 'category')
    {
        switch ($type) {
            case "category":
                $this->strategy = new CategoryBasedDiscount();
                break;
            case "customer":
                $this->strategy = new CustomerBasedDiscount();
                break;
        }
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function getDiscount(Order $order)
    {
        return $this->strategy->calculateDiscount($order);
    }
}
