<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //  $faker = Faker\Factory::create();
    	// for ($i = 0; $i < 10; $i++)
    	// {
     //  	$name = ucwords($faker->word);
     //  	Category::create([
     //  	"name" => $name,
     //  	]);
    	// }
DB::table('categories')->insert([
            [
                'name' => 'Eau de Cologne',
            ],
            [
                'name' => 'Eu De Toillete',
            ],
            [
                'name' => 'Facial Care',
            ],
            [
                'name' => 'Fertilizer',
            ],
            [
                'name' => 'Food Supplement',
            ],
            [
                'name' => 'Household',
            ],
            [
                'name' => 'Personal Care',
            ],
            [
                'name' => 'Soap Bar',
            ],
        ]);

    }
}
