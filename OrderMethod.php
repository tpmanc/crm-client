<?php

/**
 * 
 */
class OrderMethod implements Loadable
{
    private $orderMethods;

    public function __construct()
    {
        $this->orderMethods = [];

        $result = $this->load();
    }

    protected function load()
    {
        return [
            1 => 'Test',
        ];
    }
}
