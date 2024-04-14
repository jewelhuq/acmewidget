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
$cart->addProductToCart("B01");
$cart->addProductToCart("G01");
$totalPrice = $cart->calculateTotalPrice();
echo "Total Price: $totalPrice\n";



$cart = new Cart($combinedPricing);
$cart->addProductToCart("R01");
$cart->addProductToCart("R01");
$totalPrice = $cart->calculateTotalPrice();
echo "Total Price: $totalPrice\n";




$cart = new Cart($combinedPricing);
$cart->addProductToCart("R01");
$cart->addProductToCart("G01");
$totalPrice = $cart->calculateTotalPrice();
echo "Total Price: $totalPrice\n";


$cart = new Cart($combinedPricing);
$cart->addProductToCart("B01");
$cart->addProductToCart("B01");
$cart->addProductToCart("R01");
$cart->addProductToCart("R01");
$cart->addProductToCart("R01");
$totalPrice = $cart->calculateTotalPrice();
echo "Total Price: $totalPrice\n";



