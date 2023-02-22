<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order_Details', function (Blueprint $table) {
            $table->id();
            $table->integer('id_history')->after('id')->nullable();
            $table->integer('id_product')->after('id_history')->nullable();
            $table->string('name_product')->after('id_product')->nullable();
            $table->integer('product_price')->after('name_product')->nullable();
            $table->integer('product_sold_quantity')->after('product_price')->nullable();
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
        Schema::dropIfExists('Order_Details');
    }
}
