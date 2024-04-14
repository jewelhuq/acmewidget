<?php

namespace Cart;

use Cart\PricingStrategy\PricingStrategy;

class CombinedPricing implements PricingStrategy {
    private $strategies;

    public function __construct(array $strategies) {
        $this->strategies = $strategies;
    }

    public function calculateDiscount($cart_items) {
        $total_discount = 0;
        foreach ($this->strategies as $strategy) {

            $total_discount += $strategy->calculateDiscount($cart_items);



        }
        return $total_discount;
    }


}
