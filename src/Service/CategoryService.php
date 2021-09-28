<?php

namespace Order\DiscountMicroservice\Service;

class CategoryService
{
    /**
     * Get products category
     *
     * @param array $products
     * @return mixed
     */
    public function getProductsCategory(array $products)
    {
        $productsData = json_decode(file_get_contents('../var/data/products.json'), true);

        $filteredProducts = array_filter($productsData, function($product) use ($products) {
            return in_array($product['id'], array_column($products, 'product-id'));
        });

        return array_unique(array_column($filteredProducts, 'category'));
    }
}
