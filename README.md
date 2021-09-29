##Order discount microservice

##Prerequisites:

Customers and products comes from third party service (for now mocked in the service).

### Logic explained

OrderDiscount is context class that gets an order. The strategy decision happens based on pre-defined ruleset. The idea 
is to treat all existing cases based on task requirements.

### Example
```
$order = new Order($orderOne);

$orderDiscount = new OrderDiscount();
$discountData = $orderDiscount->getDiscount($order);
$order->setTotalDiscount($discountData);

var_dump($order);
```

### Installation

Run built-in php server from the root of the folder:

```php -S localhost:8000 -t public/```

Go then to ``localhost:8000`` in the browser.




