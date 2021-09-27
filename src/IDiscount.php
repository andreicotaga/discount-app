<?php

namespace Order\DiscountMicroservice;

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
     * @param array $order
     * @return mixed
     */
    public function calculateDiscount(array $order);
}
