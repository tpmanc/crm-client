<?php

/**
 * 
 */
class OrderProduct
{
    private $id;
    private $amount;
    private $price;

    public function __contruct($id, $price, $amount = false)
    {
        $this->id = $id;
        $this->price = $price;
        if ($amount === false) {
            $this->amount = 1;
        } else {
            $this->amount = $amount;
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
