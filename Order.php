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
    private $totalPrice;
    private $deliveryPrice;
    private $orderMethod;
    private $client;
    private $products;
    private $channelCode;

    public function __construct($id, $orderMethod, Client $client, $totalPrice)
    {
        $this->id = $id;
        $this->orderMethod = $orderMethod;
        $this->client = $client;
        $this->totalPrice = $totalPrice;

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

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setDeliveryPrice($deliveryPrice)
    {
        $this->deliveryPrice = $deliveryPrice;
    }

    public function getDeliveryPrice()
    {
        return $this->deliveryPrice;
    }

    public function setChannelCode($channelCode)
    {
        $this->channelCode = $channelCode;
    }

    public function getChannelCode()
    {
        return $this->channelCode;
    }

    public function toArray()
    {
        $arr = [
            'id' => $this->id,
            'date' => $this->date,
            'status' => $this->status,
            'totalPrice' => $this->totalPrice,
            'deliveryPrice' => $this->deliveryPrice,
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
            'channelCode' => $this->channelCode,
        ];

        foreach ($this->products->getProducts() as $product) {
            $productArr = [
                'id' => $product->getId(),
                'price' => $product->getPrice(),
                'amount' => $product->getAmount(),
                'title' => $product->getTitle(),
            ];

            $arr['products'][] = $productArr;
        }

        return $arr;
    }
}
