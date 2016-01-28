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
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09063508097',
            ],
            [
                'name' => 'SMARTMONEY',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09299389628',
            ],
        ]);
    }
}
