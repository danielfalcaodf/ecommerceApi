<?php

use App\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1, 20) as $key => $value) {
            DB::table('products')->insert([
                'name' => $faker->sentence(3),
                'type' => $faker->randomLetter(),
                'value' => $faker->randomFloat(2, 1, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


        //

    }
}
