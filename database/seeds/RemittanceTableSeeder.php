<?php

use Illuminate\Database\Seeder;

class RemittanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('remittances')->insert([
            [
                'name' 			=> 'WESTERNUNION',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09054321510',
            ],
            [
                'name' 			=> 'MONEYGRAM',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09054321510',
            ],
            [
                'name' 			=> 'CEBUANALHUILLIER',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09054321510',
            ],
            [
                'name' 			=> 'CEBUANAMLHUILLIER',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09054321510',
            ],
            [
                'name' 			=> 'LBCREMITTANCE',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09054321510',
            ],
            [
                'name' 			=> 'PALAWANEXPRESS',
                'sender_name' 	=> 'Jonalyn Evangelista',
                'mobile_no'	=> '09054321510',
            ],
            
        ]);
    }
}
