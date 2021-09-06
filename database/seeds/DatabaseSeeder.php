<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class, BuyersTableSeeder::class, ProductsTableSeeder::class, ProductsImagesTableSeeder::class, CheckoutsTableSeeder::class, CheckoutsProductsTableSeeder::class]);
    }
}