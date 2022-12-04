<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_details_order', function (Blueprint $table) {
            $table->string('order_code', 20);
            $table->foreign('order_code')
                ->references('order_code')
                ->on('tbl_orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('id_product');
            $table->foreign('id_product')
                ->references('id')
                ->on('tbl_products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->integer('quantity');
            $table->string('unit_of_measure', 45);
            $table->integer('price');
            $table->integer('discount');
            $table->integer('into_money');
            $table->unsignedInteger('id_category_product');
            $table->foreign('id_category_product')
                ->references('id')
                ->on('tbl_category_product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_details_order');
    }
};
