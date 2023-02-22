<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //

            $table->integer('id_history')->after('id')->nullable();
            $table->integer('id_product')->after('id_history')->nullable();
            $table->string('name_product')->after('id_product')->nullable();
            $table->integer('product_price')->after('name_product')->nullable();
            $table->integer('product_sold_quantity')->after('product_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
}
