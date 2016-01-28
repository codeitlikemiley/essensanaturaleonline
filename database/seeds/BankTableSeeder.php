<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'name' 			=> 'BDO',
                'account_name' 	=> 'Jasmin Bello',
                'account_id'	=> '000661141497',
            ],
            [
                'name' => 'BPI',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '2689020383',
            ],
            [
                'name' => 'METROBANK',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '123456789',
            ],
            [
                'name' => 'UNIONBANK',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '987654321',
            ],
            [
                'name' => 'EASTWEST',
                'account_name' 	=> 'Jonalyn Evangelista',
                'account_id'	=> '200009019676',
            ],
            
        ]);
    }
}
