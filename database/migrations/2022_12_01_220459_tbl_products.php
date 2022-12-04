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
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('price');
            $table->integer('discount');
            $table->text('description');
            $table->text('details');
            $table->integer('state');
            $table->string('image_main', 100);
            $table->string('image_two', 100);
            $table->string('image_three', 100);
            $table->string('image_four', 100);
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
        Schema::dropIfExists('tbl_products');
    }
};
