<?php

namespace Order\DiscountMicroservice\Strategy;

use Order\DiscountMicroservice\IDiscount;
use Order\DiscountMicroservice\Model\Order;
use Order\DiscountMicroservice\Service\CategoryService;

/**
 * Class CategoryBasedDiscount
 * @package Order\DiscountMicroservice
 *
 * Concrete Strategy class implement the algorithm while following the base IDiscount
 * interface. Calculate discount based on categories.
 */
class CategoryBasedDiscount implements IDiscount
{
    const ELIGIBLE_CATEGORIES_FOR_DISCOUNT = [
        '1',
        '2'
    ];

    /**
     * @var CategoryService
     */
    private CategoryService $categoryService;

    /**
     * CategoryBasedDiscount constructor.
     */
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    /**
     * @param Order $order
     * @return int
     */
    public function calculateDiscount(Order $order)
    {
        $categories = $this->categoryService->getProductsCategory($order->getItems());

        if (!empty(array_diff(self::ELIGIBLE_CATEGORIES_FOR_DISCOUNT, $categories))) {
            return 0;
        }
    }
}
