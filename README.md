# CRM Client

## Install via Composer

Run the following command

```bash
$ composer require tpmanc/crmclient "*"
```

or add

```bash
$ "tpmanc/crmclient": "*"
```

to the require section of your `composer.json` file.

## Send orders

```php
use tpmanc\crmclient\ApiClient;
use tpmanc\crmclient\Client;
use tpmanc\crmclient\Order;
use tpmanc\crmclient\OrderProduct;
use tpmanc\crmclient\OrderProducts;

...

$client = new Client(
    'Name 8', // name
    '+7 (952) 268-97-23' // phone
);
$client->setEmail('email@email.test');
$client->setAddress('Address');
$client->setDelivery('Delivery Type');
$client->setPayment('Payment Type');
$client->setComment('Comment');

$orderProducts = new OrderProducts();
$orderProducts->addProduct(new OrderProduct(
    1982, // product id
    5000 // product price
));
$orderProducts->addProduct(new OrderProduct(
    6571, // product id
    1000, // product price
    5 // amount
));

$orderMethod = 1;
$order = new Order(
    '5317263', // id
    $orderMethod,
    $client
);
$timestamp = time();
$order->setDate($timestamp);
$order->setStatus(3);
$order->setProducts($orderProducts);


$apiUrl = 'http://localhost:8080';
$token = '5XG2qsuKriI6Cq6sYX9krZb622rQ9w6O6XW833HZ';
$api = new ApiClient($apiUrl, $token);
$api->addOrder($order);

$result = $api->sendOrders();
```

