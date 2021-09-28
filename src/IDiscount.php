<?php

namespace Order\DiscountMicroservice;

use Order\DiscountMicroservice\Model\Order;

/**
 * Interface IDiscount
 * @package Order\DiscountMicroservice
 *
 * The IDiscount interface declares operations common to all supported versions
 * of discount calculations.
 *
 * The Context uses this interface to call the calculateDiscount defined by Concrete
 * Strategies.
 */
interface IDiscount
{
    /**
     * @param Order $order
     * @return mixed
     */
    public function calculateDiscount(Order $order);
}
