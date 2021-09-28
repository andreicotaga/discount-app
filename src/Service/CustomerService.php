<?php

namespace Order\DiscountMicroservice\Service;

class CustomerService
{
    /**
     * Get unique customer
     *
     * @param string $id
     * @return mixed
     */
    public function getCustomer(string $id)
    {
        $customers = json_decode(file_get_contents('../var/data/customers.json'), true);

        return current(array_filter($customers, function($customer) use ($id) {
            return $customer['id'] === $id;
        }));
    }
}
