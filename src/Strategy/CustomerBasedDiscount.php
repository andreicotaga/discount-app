<?php

namespace Order\DiscountMicroservice\Strategy;

use Order\DiscountMicroservice\IDiscount;
use Order\DiscountMicroservice\Model\Order;
use Order\DiscountMicroservice\Service\CustomerService;

/**
 * Class CustomerBasedDiscount
 * @package Order\DiscountMicroservice
 *
 * Concrete Strategy class implement the algorithm while following the base IDiscount
 * interface. Calculate discount based on customer data (revenue, ordered products, order history, etc.)
 */
class CustomerBasedDiscount implements IDiscount
{
    /**
     * @var CustomerService
     */
    private CustomerService $customerService;

    /**
     * CustomerBasedDiscount constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService();
    }

    /**
     * @param Order $order
     * @return mixed|void
     */
    public function calculateDiscount(Order $order)
    {
        $customer = $this->customerService->getCustomer($order->getCustomerId());

        if ((float)$customer['revenue'] > 1000) {
            return 10;
        }

        return 0;
    }
}
