<?php

namespace Order\DiscountMicroservice\Strategy;

use Order\DiscountMicroservice\IDiscount;
use Order\DiscountMicroservice\Model\Order;
use Order\DiscountMicroservice\Service\CategoryService;
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
     * @var CategoryService
     */
    private CategoryService $categoryService;

    /**
     * CustomerBasedDiscount constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService();
        $this->categoryService = new CategoryService();
    }

    /**
     * @param Order $order
     * @return mixed|void
     */
    public function calculateDiscount(Order $order)
    {
        $customer = $this->customerService->getCustomer($order->getCustomerId());
        $categories = $this->categoryService->getProductsCategory($order->getItems());

        $discount = 0;
        if ((float)$customer['revenue'] > 1000) {
            $discount = 10;
        }

        return $discount;
    }
}
