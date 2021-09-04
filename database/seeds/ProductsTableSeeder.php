<?php

use App\Models\Product;
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
        $faker = Faker::create();
        foreach (range(1, 20) as $key => $value) {
            DB::table('products')->insert([
                'name' => $faker->company,
                'type' => $faker->randomLetter(),
                'value' => $faker->randomFloat(2, 1, 100),
                'img' => $faker->image(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


        //

    }
}