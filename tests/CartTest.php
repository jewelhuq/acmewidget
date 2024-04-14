<?php

use PHPUnit\Framework\TestCase;
use Cart\Cart;
use Cart\PricingStrategy\RegularPricing;
use Cart\PricingStrategy\DeliveryFeePricing;
use Cart\PricingStrategy\BuyOneGetOneHalfOff;
use Cart\CombinedPricing;

class CartTest extends TestCase {



    public function testCase1() {

        $regularPricing = new RegularPricing();
        $buyOneGetOneHalfOff = new BuyOneGetOneHalfOff('R01');
        $combinedPricing = new CombinedPricing([$regularPricing, $buyOneGetOneHalfOff]);

        $cart = new Cart($combinedPricing);
        $cart->addProductToCart('B01');
        $cart->addProductToCart('G01');
        $totalPrice = $cart->calculateTotalPrice();
        $this->assertEquals(37.85, $totalPrice);
    }

    public function testCase2() {
        $regularPricing = new RegularPricing();
        $buyOneGetOneHalfOff = new BuyOneGetOneHalfOff('R01');
        $combinedPricing = new CombinedPricing([$regularPricing, $buyOneGetOneHalfOff]);

        $cart = new Cart($combinedPricing);
        $cart->addProductToCart('R01');
        $cart->addProductToCart('R01');
        $totalPrice = $cart->calculateTotalPrice();
        $this->assertEquals(54.37, $totalPrice);
    }

    public function testCase3() {
        $regularPricing = new RegularPricing();
        $buyOneGetOneHalfOff = new BuyOneGetOneHalfOff('R01');
        $combinedPricing = new CombinedPricing([$regularPricing, $buyOneGetOneHalfOff]);

        $cart = new Cart($combinedPricing);
        $cart->addProductToCart('R01');
        $cart->addProductToCart('G01');
        $totalPrice = $cart->calculateTotalPrice();
        $this->assertEquals(60.85, $totalPrice);
    }

    public function testCase4() {
        $regularPricing = new RegularPricing();
        $buyOneGetOneHalfOff = new BuyOneGetOneHalfOff('R01');
        $combinedPricing = new CombinedPricing([$regularPricing, $buyOneGetOneHalfOff]);
        $cart = new Cart($combinedPricing);
        $cart->addProductToCart('B01');
        $cart->addProductToCart('B01');
        $cart->addProductToCart('R01');
        $cart->addProductToCart('R01');
        $cart->addProductToCart('R01');
        $totalPrice = $cart->calculateTotalPrice();
        $this->assertEquals(98.27, $totalPrice);
    }
}
