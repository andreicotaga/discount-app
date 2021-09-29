<?php

namespace Order\DiscountMicroservice\Strategy;

use Order\DiscountMicroservice\Constants\EligibleDiscounts;
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
        $discount = 0;
        $categories = $this->categoryService->getProductsCategory($order->getItems());

        $eligibleCategory = current(array_intersect(array_keys(EligibleDiscounts::ELIGIBLE_CATEGORIES_FOR_DISCOUNT), $categories));

        if (empty($eligibleCategory)) {
            return $discount;
        }

        $conditions = EligibleDiscounts::ELIGIBLE_CATEGORIES_FOR_DISCOUNT[$eligibleCategory];

        foreach ($order->getItems() as $item) {
            $totalQuantity = 0;
            $totalQuantity += $item['quantity'];

            if ($item['quantity'] > $conditions['quantity']) {
                $freeItems = (int)($item['quantity']/$conditions['quantity']);

                $newQuantity = $item['quantity'] - $freeItems;
                $newTotal = $item['unit-price'] * $newQuantity;

                $discount = ($order->getTotal() - $newTotal)/$order->getTotal()*100;
            }

            $minPriceProduct = min($order->getItems());
            if ($totalQuantity >= $conditions['quantity']) {
                // Set new product total price based on minPriceProduct
                // Calculate new total and set it on order
                // Based on that calculate discount ($order->getTotal() - $newTotal)/$order->getTotal()*100;
            }
        }

        return $discount;
    }
}
