<?php

namespace Cart;

use Cart\PricingStrategy\PricingStrategy;
use Cart\Traits\getPriceByCodeTrait;

class Cart
{
    use getPriceByCodeTrait;
    private $cart_items;
    private $pricing_strategy;
    private array $product_table;

    public function __construct(PricingStrategy $pricing_strategy)
    {
        $this->pricing_strategy = $pricing_strategy;
    }

    public function addProductToCart($product_code)
    {
        $this->cart_items[] = $product_code;
    }

    public function calculateTotalPrice()
    {
        $total = 0;
        foreach ($this->cart_items as $item_code) {
            // Assuming the getPriceByCode method is implemented somewhere
            $item_price = $this->getPriceByCode($item_code);
            $total += $item_price;
        }

        $discount = $this->pricing_strategy->calculateDiscount($this->cart_items);
        $total = $total - $discount;
        $deliveryfee = $this->calculateDeliveryFee($total);
        $total = $total + $deliveryfee;

        return bcadd(0, $total, 2);
    }

    public function calculateDeliveryFee($total)
    {

        $delivery_fee = 0;
        if ($total < 50) {
            $delivery_fee = 4.95;
        } elseif ($total < 90) {
            $delivery_fee = 2.95;

        }
        return $delivery_fee;

    }



}
