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
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09054321510',
            ],
            [
                'name' 			=> 'MONEYGRAM',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09054321510',
            ],
            [
                'name' 			=> 'CEBUANALHUILLIER',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09054321510',
            ],
            [
                'name' 			=> 'CEBUANAMLHUILLIER',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09054321510',
            ],
            [
                'name' 			=> 'LBCREMITTANCE',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09054321510',
            ],
            [
                'name' 			=> 'PALAWANEXPRESS',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '09054321510',
            ],
            
        ]);
    }
}
