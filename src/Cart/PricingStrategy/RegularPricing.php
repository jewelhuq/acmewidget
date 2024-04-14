<?php

namespace Cart\PricingStrategy;

class RegularPricing implements PricingStrategy {
    public function calculateDiscount($cart_items) {
        return 0; // No discount for regular pricing
    }
}
