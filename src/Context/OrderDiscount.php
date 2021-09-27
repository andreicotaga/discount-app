<?php

namespace Order\DiscountMicroservice\Context;

use Order\DiscountMicroservice\IDiscount;

/**
 * Class OrderDiscount
 * @package Order\DiscountMicroservice
 */
class OrderDiscount
{
    /**
     * @var array
     */
    private $order;

    /**
     * @var int
     */
    private $discount = 0;

    /**
     * OrderDiscount constructor.
     * @param array $order
     */
    public function __construct(array $order)
    {
        $this->order = $order;
    }

    /**
     * @param IDiscount $discount
     * @return mixed
     */
    public function getDiscount(IDiscount $discount)
    {
        return $this->discount = $discount->calculateDiscount($this->order);
    }
}
