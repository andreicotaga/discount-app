<?php

namespace Order\DiscountMicroservice\Strategy;

use Order\DiscountMicroservice\IDiscount;

/**
 * Class CategoryBasedDiscount
 * @package Order\DiscountMicroservice
 *
 * Concrete Strategy class implement the algorithm while following the base IDiscount
 * interface. Calculate discount based on categories.
 */
class CategoryBasedDiscount implements IDiscount
{
    /**
     * A customer who has already bought for over € 1000, gets a discount of 10% on the whole order.
     * For every product of category "Switches" (id 2), when you buy five, you get a sixth for free.
     * If you buy two or more products of category "Tools" (id 1), you get a 20% discount on the cheapest product.
     */
    /**
     * @param array $order
     */
    public function calculateDiscount(array $order)
    {

    }
}
