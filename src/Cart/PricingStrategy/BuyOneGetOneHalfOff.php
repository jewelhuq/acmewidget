<?php

namespace Cart\PricingStrategy;

use Cart\Traits\getPriceByCodeTrait;

class BuyOneGetOneHalfOff implements PricingStrategy {
    use getPriceByCodeTrait;
    private $discounted_product_code;

    public function __construct($discounted_product_code) {
        $this->discounted_product_code = $discounted_product_code;
    }

    public function calculateDiscount($cart_items) {
        $discounted_product_qnt = 0;
        foreach ($cart_items as $item_code) {
            if ($item_code == $this->discounted_product_code) {
                $discounted_product_qnt += 1;
            }
        }

        $item_price = $this->getPriceByCode($this->discounted_product_code);
        $even_count = 0;
        for ($i = 1; $i <= $discounted_product_qnt; $i++) {
            if ($i % 2 == 0) {
                $even_count++;
            }
        }
        return ($even_count * ($item_price * 0.5));
    }



}
