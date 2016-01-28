<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(MobileTransferSeeder::class);
        $this->call(RemittanceTableSeeder::class);
        // $this->call(OrderTableSeeder::class);
        // $this->call(ItemOrderTableSeeder::class);
    }
}
