Acme Widget Co



How it Works

Classes

1. Cart: Represents a shopping cart. You can add products to the cart and calculate the total price. The Cart class accepts a pricing strategy as a dependency, allowing you to apply different pricing rules when calculating the total price.

2. Pricing Strategies:
    - RegularPricing: Implements regular pricing without any discounts or special offers.
    - BuyOneGetOneHalfOff: Implements a "buy one, get one half off" discount for a specific product.


Usage

1. Create an instance of the Cart class, passing the desired pricing strategy as a dependency.
2. Add products to the cart using the addProductToCart method.
3. Call the calculateTotalPrice method to calculate the total price of the cart.

Installation
1. ```git clone https://github.com/jewelhuq/acmewidget.git```
2. ```composer install```
3. index.php 
4. test   ./vendor\bin\phpunit tests\CartTest.php



Example
```
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
```


Assumptions

- Product prices are provided externally
- Each product has a unique code.
- The delivery fee is calculated based on the total price of the cart.
