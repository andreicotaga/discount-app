##Order discount microservice

##Prerequisites:

Customers and products comes from third party service (for now mocked in the service).

### Logic explained

OrderDiscount is context class that gets an order. The strategy decision happens based on pre-defined ruleset. The idea 
is to treat the cases when the same order applies to multiple discounts.

### Example
```
    $order = OrderDiscount($order);
    $discount = $order->getDiscount();
```


