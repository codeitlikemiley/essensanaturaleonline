<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::all();
        foreach ($categories as $category) {
            for ($i = 0; $i < rand(-1, 10); ++$i) {
                $name = ucwords($faker->word);
                $stock = $faker->numberBetween(0, 100);
                $price = $faker->randomFloat(2, 5, 100);
                $summary = $faker->sentence();
                $description = $faker->paragraph();
                $image = $faker->imageUrl($width = 640, $height = 480);
                Product::create([
            'name' => $name,
            'stock' => $stock,
            'price' => $price,
            'description' => $description,
            'summary' => $summary,
            'image' => $image,
            'category_id' => $category->id,
            ]);
            }
        }
    }
}
