<?php

/**
 * 
 */
class Client
{
    private $name;
    private $phone;
    private $email;
    private $address;
    private $delivery;
    private $payment;
    private $comment;

    public function __contruct($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
