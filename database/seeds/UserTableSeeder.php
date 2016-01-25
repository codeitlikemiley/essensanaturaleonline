<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        if(!User::find(1)){
          DB::table('users')->insert([

                'username'   => 'masterpowers',
                'email'      => 'masterpowers001@gmail.com',
                'password'   => Hash::make('Imsoocool17'),
                'active'     => 1,
                'status'     => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ]);
        }
        

        // $faker = Faker\Factory::create();
        //  for ($i = 0; $i < 10; $i++)
        //  {
        
        // foreach (range(2, 51) as $index) {
        // $username = str_replace('.', '_', $faker->unique()->userName);
        // $symbol = '@';
        // $domain = 'gmail.com';
        // $email    = $username.$symbol.$domain;
        // $password = 'password';
        //     User::create([
        //         'sp_id'      => $index - 1,
        //         'username'   => $username,
        //         'email'      => $email,
        //         'password'   => $password,
        //         'active'     => 1,
        //         'status'     => 1,
        //         'created_at' => \Carbon\Carbon::now(),
        //         'updated_at' => \Carbon\Carbon::now(),
        //     ]);
        // } //endforeach
        // }   
    }
}
