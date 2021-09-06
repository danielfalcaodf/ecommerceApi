<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'danielfalcao.df@gmail.com',
            'password' =>  Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        foreach (range(1, 20) as $key => $value) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email(),
                'password' =>  Hash::make('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
