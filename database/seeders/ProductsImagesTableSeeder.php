<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $request = new Request;

        Storage::deleteDirectory('products/imgs');

        foreach (range(1, 20) as $key => $value) {
            $img = $key + 1;
            $fileAddress = public_path() . "/demos/products/img/{$img}.jpg";
            if ($img >= 15) {
                $fileAddress = public_path() . "/demos/products/img/semFoto.jpg";
            }

            $file = new UploadedFile($fileAddress, 'file');
            $request->files->set($img, $file);
        }

        foreach ($request->allFiles() as $key => $value) {
            $file = $value;
            DB::table('products_images')->insert([
                'idprod' => $key,
                'path' => $file->store("products/imgs/{$key}"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


        //

    }
}