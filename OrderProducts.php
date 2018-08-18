<?php

namespace tpmanc\crmclient;

/**
 * 
 */
class OrderProducts
{
    private $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function addProduct(OrderProduct $product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }
}
