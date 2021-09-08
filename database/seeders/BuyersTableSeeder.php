<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BuyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        $phone = $faker->phoneNumber();
        DB::table('buyers')->insert([
            'iduser' => 1,
            'phone_cell' => "{$phone}",
            'cpf' =>  $faker->cpf(false),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        foreach (range(1, 20) as $key => $value) {


            $phone = $faker->phoneNumber();
            DB::table('buyers')->insert([
                'iduser' => ($key + 2),
                'phone_cell' => "{$phone}",
                'cpf' => $faker->cpf(false),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}