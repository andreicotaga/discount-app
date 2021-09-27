<?php

namespace Order\DiscountMicroservice\Service;

class CustomerService
{
    /**
     * Get unique custom
     *
     * @param string $id
     */
    public function getCustomer($id)
    {
        $customers = json_decode(file_get_contents('../var/data/customers.json'), true);

        return array_filter($customers, function($customer) use ($id) {
            return $customer['id'] = $id;
        });
    }
}
