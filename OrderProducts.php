<?php

/**
 * 
 */
class OrderProducts
{
    private $products;

    public function __contruct()
    {
        $this->products = [];
    }

    public function addProduct(OrderProduct $product)
    {
        $this->products[] = $product;
    }
}
