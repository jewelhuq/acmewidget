<?php

namespace Cart\PricingStrategy;

interface PricingStrategy {
    public function calculateDiscount($cart_items);
}
?>