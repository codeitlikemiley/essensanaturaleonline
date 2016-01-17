<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = 
    	[
    	['name' => 'Affirmative EDC', 'price' => 150.00, 'description' => 'Infused with Essential Oils and Alkaline Ions No Methanol Content Non-Toxic', 'image' => '/img/buah-merah.jpg', 'rating_cache' => 5.0, 'rating_count' => 10],
        ['name' => 'Herbs Central 8 in 1 UNI', 'price' => 250.00, 'description' => 'A great instant coffee especially formulated for coffee drinkers who want more from their cup', 'image' => '/img/buah-merah.jpg', 'rating_cache' => 3.0, 'rating_count' => 10],
		];
        DB::table('products')->insert($products);
    }
}
