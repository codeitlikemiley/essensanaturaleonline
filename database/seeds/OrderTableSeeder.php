<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $faker = Faker\Factory::create();
        foreach ($users as $user)
    	{
      		for ($i = 0; $i < rand(-1, 5); $i++)
      		{
          $attachment = $faker->imageUrl($width = 640, $height = 480);
          $shipmentfee = $faker->randomFloat(2, 5, 100);
          $tax = $shipmentfee * .1;
          $subtotal = $faker->randomFloat(2, 5, 100);
          $total = $shipmentfee + $tax + $subtotal;
          $comment = $faker->paragraph();


        	Order::create([
          	"user_id" => $user->id,
            "attachment" => $attachment,
            "status" => 'unpaid',
            "method" => 'pickup',
            "sub_total" => $subtotal,
            "tax" => $tax,
            "shipment_fee" => $shipmentfee,
            "total" => $total,
            "comment" => $comment

        	]);
      		}
    	}
    }
}
