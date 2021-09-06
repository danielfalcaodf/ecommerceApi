<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CheckoutsProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1, 10) as $key => $value) {
            foreach (range(1, $faker->numberBetween(1, 5)) as $k => $value) {
                $idcheck = $key + 1;
                $idprod = $faker->numberBetween(1, 20);
                $quant = $faker->numberBetween(1, 10);
                $product =  DB::table('products')->find($idprod);
                DB::table('checkouts_products')->insert([

                    'idcheck' =>  $idcheck,
                    'idprod' =>  $idprod,
                    'quant' => $quant,
                    'subtotal' => ($product ? ($quant *  $product->value) : 0),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $checkouts =  DB::table('checkouts')->find($idcheck);
                DB::table('checkouts')->where('id', $checkouts->id)->update(['value_total' => ($checkouts->value_total += ($product ? ($quant *  $product->value) : 0))]);
            }
        }
    }
}