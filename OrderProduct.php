<?php

namespace tpmanc\crmclient;

/**
 * 
 */
class OrderProduct
{
    private $id;
    private $amount;
    private $price;
    private $title;

    public function __construct($id, $price, $amount = false)
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

    public function setTitle($title)
    {
        $this->title = $title;
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

    public function getTitle()
    {
        return $this->title;
    }
}
