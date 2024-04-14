<?php

require_once 'vendor/autoload.php';

use Cart\Cart;
use Cart\PricingStrategy\RegularPricing;
use Cart\PricingStrategy\BuyOneGetOneHalfOff;
use Cart\CombinedPricing;




$regularPricing = new RegularPricing();
$buyOneGetOneHalfOff = new BuyOneGetOneHalfOff('R01');
$combinedPricing = new CombinedPricing([$regularPricing, $buyOneGetOneHalfOff]);


$cart = new Cart($combinedPricing);
/*
// Add products to the cart
$cart->addProductToCart("B01");
$cart->addProductToCart("B01");
$cart->addProductToCart("R01");
$cart->addProductToCart("R01");
$cart->addProductToCart("R01");
*/

$cart->addProductToCart("B01");
$cart->addProductToCart("G01");


// Calculate total price
$totalPrice = $cart->calculateTotalPrice();

// Output total price
echo "Total Price: $totalPrice\n";
