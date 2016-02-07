<?php

use Illuminate\Database\Seeder;

class MobileTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobile_transfers')->insert([
            [
                'name' 			=> 'GCASH',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09063508097',
            ],
            [
                'name' => 'SMARTMONEY',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '5299676029033103',
            ],
        ]);
    }
}
