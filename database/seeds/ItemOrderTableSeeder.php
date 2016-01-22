<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;
use App\ItemOrder;

class ItemOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $orders = Order::all();
        $products = Product::all()->toArray();
        foreach ($orders as $order) {
            $used = [];
            for ($i = 0; $i < rand(1, 5); ++$i) {
                $product = $faker->randomElement($products);
                if (!in_array($product['id'], $used)) {
                    $id = $product['id'];
                    $price = $product['price'];
                    $quantity = $faker->numberBetween(1, 3);

                    ItemOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'price' => $price,
                    'qty' => $quantity,
                    ]);
                    $used[] = $product['id'];
                }
            }
        }
    }
}
