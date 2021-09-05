<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idbuyer');
            $table->enum('status', [
                'pending',
                'cancelled',
                'shipped',
                'paid',
                'finished'
            ])
                ->default('pending');
            $table->double('value_total')->default('0');
            $table->foreign('idbuyer')->references('id')->on('buyers')->onDelete('CASCADE');
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
        Schema::dropIfExists('checkouts');
    }
}