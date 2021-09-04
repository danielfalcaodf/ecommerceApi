<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idcheck');
            $table->unsignedBigInteger('idprod');
            $table->integer('quant');
            $table->double('subtotal');
            $table->foreign('idcheck')->references('id')->on('checkouts')->onDelete('CASCADE');
            $table->foreign('idprod')->references('id')->on('products')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts_products');
    }
}