<?php

namespace Order\DiscountMicroservice\Model;

class Order
{
    /**
     * @var string|array
     */
    private $order;

    /**
     * Order constructor.
     * @param string $order
     */
    public function __construct(string $order)
    {
        $this->order = $this->toArray($order);
    }

    /**
     * @return mixed|string
     */
    public function getCustomerId()
    {
        return $this->order['customer-id'];
    }

    /**
     * @return mixed|string
     */
    public function getTotal()
    {
        return $this->order['total'];
    }

    /**
     * @param int $discount
     * @return mixed|string
     */
    public function setTotalDiscount(int $discount)
    {
        $this->order['total'] = $this->order['total'] - (($this->order['total'] * $discount) / 100);
    }

    /**
     * @return mixed|string
     */
    public function getItems()
    {
        return $this->order['items'];
    }

    /**
     * @param string $order
     * @return mixed
     */
    public function toArray(string $order)
    {
        return json_decode($order, true);
    }
}
