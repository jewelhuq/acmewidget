<?php

namespace Cart\Traits;

trait getPriceByCodeTrait
{
    private function getPriceByCode($code)
    {

        $this->product_table = [
            ['code' => 'R01', 'name' => 'Red Widget', 'price' => 32.95],
            ['code' => 'G01', 'name' => 'Green Widget', 'price' => 24.95],
            ['code' => 'B01', 'name' => 'Blue Widget', 'price' => 7.95]
        ];

        foreach ($this->product_table as $product) {
            if ($product['code'] === $code) {
                return $product['price'];
            }
        }
        return null;

    }
}