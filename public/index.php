<?php

use Order\DiscountMicroservice\Context\OrderDiscount;
use Order\DiscountMicroservice\Model\Order;

require __DIR__ . '/../vendor/autoload.php';

$orderOne = file_get_contents('../var/data/order1.json');
$orderTwo = file_get_contents('../var/data/order2.json');
$orderThree = file_get_contents('../var/data/order3.json');

$orderOne = new Order($orderOne);
$orderTwo = new Order($orderTwo);
$orderThree = new Order($orderThree);

$orderDiscountOne = new OrderDiscount();
$orderDiscountTwo = new OrderDiscount('customer');
$orderDiscountThree = new OrderDiscount();

$discountDataOne = $orderDiscountOne->getDiscount($orderOne);
$discountDataTwo = $orderDiscountTwo->getDiscount($orderTwo);
$discountDataThree = $orderDiscountThree->getDiscount($orderThree);

$orderOne->setTotalDiscount($discountDataOne);
$orderTwo->setTotalDiscount($discountDataTwo);
$orderThree->setTotalDiscount($discountDataThree);

var_dump($orderOne);
var_dump($orderTwo);
var_dump($orderThree);

die;
