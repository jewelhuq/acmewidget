<?php





class Cart
{
    private $cart_items;
    private $product_table;
    public function __construct()
    {
        $this->product_table = [
            ['code' => 'R01', 'name' => 'Red Widget', 'price' => 32.95],
            ['code' => 'G01', 'name' => 'Green Widget', 'price' => 24.95],
            ['code' => 'B01', 'name' => 'Blue Widget', 'price' => 7.95]
        ];

    }

    public function addProductToCart($product_code)
    {

        $this->cart_items[] = $product_code;


    }

    public function calculateTotalPrice()
    {



        $total = 0;
        foreach ($this->cart_items as $item_code) {
            $item_price = $this->getPriceByCode($item_code);
            $total += $item_price;
        }

        //apply special price
        $discount = $this->calculateSpecialDiscount();


        $total = $total - $discount;


        //apply delivery fee

        $delivery_fee = 0;
        if ($total < 50) {
            $delivery_fee = 4.95;
        } elseif ($total < 90) {
            $delivery_fee = 2.95;

        }

        $total += $delivery_fee;


        return bcadd(0,$total,2);


    }

    public function getPriceByCode($code)
    {
        foreach ($this->product_table as $product) {
            if ($product['code'] === $code) {
                return $product['price'];
            }
        }
        return null;
    }

    public function calculateSpecialDiscount()
    {
        $discounted_product_qnt = 0;
        foreach ($this->cart_items as $item_code) {

            if ($item_code == 'R01') {
                $discounted_product_qnt += 1;
            }

        }
        $item_price = $this->getPriceByCode('R01');
        $even_count = 0;
        for ($i = 1; $i <= $discounted_product_qnt; $i++) {
            if ($i % 2 == 0) {
                $even_count++;
            }
        }
        return $even_count * ($item_price*0.5);


    }


}

$new = new Cart();
$new->addProductToCart("B01");
$new->addProductToCart("G01");
$total = $new->calculateTotalPrice();
echo $total."\n";


$new = new Cart();
$new->addProductToCart("R01");
$new->addProductToCart("R01");
$total = $new->calculateTotalPrice();
echo $total."\n";

$new = new Cart();
$new->addProductToCart("R01");
$new->addProductToCart("G01");
$total = $new->calculateTotalPrice();
echo $total."\n";


$new = new Cart();
$new->addProductToCart("B01");
$new->addProductToCart("B01");
$new->addProductToCart("R01");
$new->addProductToCart("R01");
$new->addProductToCart("R01");
$total = $new->calculateTotalPrice();
echo $total."\n";


