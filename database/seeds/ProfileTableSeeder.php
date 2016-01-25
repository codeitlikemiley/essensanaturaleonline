<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Profile::truncate();

    	if(!Profile::find(1)){
    		DB::table('profiles')->insert([
            'user_id'        => 1,
            'first_name'     => 'Uriah',
            'last_name'      => 'Galang',
            'profile_pic'    => '/img/avatar.png',
            'about_me'       => 'Im Your Admin',
            'display_name'   => 'Master Powers',
            'contact_no'     => '12345678900',
            'address'        => 'NPA',
            'city'           => 'Los Angeles',
            'province_state' => 'California',
            'zip_code'       => '2200',
            'country'        => 'Uranus',
            'created_at'     => \Carbon\Carbon::now(),
            'updated_at'     => \Carbon\Carbon::now(),
        ]);
    	}
        

        // $faker = Faker\Factory::create();

        
        // foreach (range(2, 51) as $index) {
        //     Profile::create([
        //         'user_id'        => $index,
        //         'first_name'     => $faker->firstName,
        //         'last_name'      => $faker->lastName,
        //         'profile_pic'    => $faker->imageUrl($width = 125, $height = 125),

        //         'about_me'       => $faker->paragraph(5),
        //         'display_name'   => $faker->name,
        //         'contact_no'     => $faker->phoneNumber,
        //         'address'        => $faker->streetAddress,
        //         'city'           => $faker->city,
        //         'province_state' => $faker->state,
        //         'zip_code'       => $faker->postcode,
        //         'country'        => $faker->country,
        //         'created_at'     => \Carbon\Carbon::now(),
        //         'updated_at'     => \Carbon\Carbon::now(),
        //     ]);
        // }
    }
}
