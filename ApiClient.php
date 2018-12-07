<?php

namespace tpmanc\crmclient;

class ApiClient
{
    private $url;
    private $token;
    private $orders;
    private $products;

    public function __construct($apiUrl, $token)
    {
        $this->url = $apiUrl;
        $this->token = $token;
        $this->orders = [];
        $this->products = [];
    }

    public function addOrder(Order $order)
    {
        $this->orders[] = $order->toArray();

        usort($this->orders, ['self', 'sortOrdersById']);
    }

    public function addOrders(array $orders)
    {
        foreach ($orders as $order) {
            $this->orders[] = $order->toArray();
        }

        usort($this->orders, ['self', 'sortOrdersById']);
    }

    private static function sortOrdersByDate($a, $b)
    {
        if ($a == $b) {
            return 0;
        }
        return ($a['date'] < $b['date']) ? 1 : -1;
    }

    private static function sortOrdersById($a, $b)
    {
        if ($a == $b) {
            return 0;
        }
        return ($a['id'] < $b['id']) ? -1 : 1;
    }

    public function sendOrders()
    {
        $data = [
            'accessToken' => $this->token,
            'orders' => json_encode($this->orders),
        ];

        $curl = curl_init($this->url . '/api/orders');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        curl_close($curl);

        $this->orders = [];

        return $response;
    }
}
