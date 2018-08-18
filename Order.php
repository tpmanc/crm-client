<?php

namespace tpmanc\crmclient;

/**
 * 
 */
class Order
{
    private $id;
    private $date;
    private $status;
    private $orderMethod;
    private $client;
    private $products;

    public function __construct($id, $orderMethod, Client $client)
    {
        $this->id = $id;
        $this->orderMethod = $orderMethod;
        $this->client = $client;

        $this->status = 0;
        $this->products = [];
        $this->date = time();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setOrderMethod(OrderMethod $orderMethod)
    {
        $this->orderMethod = $orderMethod;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function setProducts(OrderProducts $products)
    {
        $this->products = $products;
    }

    public function toArray()
    {
        $arr = [
            'id' => $this->id,
            'date' => $this->date,
            'status' => $this->status,
            'orderMethod' => $this->orderMethod,
            'client' => [
                'name' => $this->client->getName(),
                'phone' => $this->client->getPhone(),
                'email' => $this->client->getEmail(),
                'address' => $this->client->getAddress(),
                'delivery' => $this->client->getDelivery(),
                'payment' => $this->client->getPayment(),
                'comment' => $this->client->getComment(),
            ],
            'products' => [],
        ];

        foreach ($this->products->getProducts() as $product) {
            $productArr = [
                'id' => $product->getId(),
                'price' => $product->getPrice(),
                'amount' => $product->getAmount(),
            ];

            $arr['products'][] = $productArr;
        }

        return $arr;
    }
}
