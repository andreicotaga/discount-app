<?php

namespace Order\DiscountMicroservice\Strategy;

use Order\DiscountMicroservice\IDiscount;

/**
 * Class CustomerBasedDiscount
 * @package Order\DiscountMicroservice
 *
 * Concrete Strategy class implement the algorithm while following the base IDiscount
 * interface. Calculate discount based on customer data (revenue, ordered products, order history, etc.)
 */
class CustomerBasedDiscount implements IDiscount
{
    public function calculateDiscount($data)
    {
        // TODO: Implement calculateDiscount() method.
    }
}
