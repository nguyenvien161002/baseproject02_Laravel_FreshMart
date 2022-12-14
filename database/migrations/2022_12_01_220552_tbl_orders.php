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
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->string('order_code', 20)->primary();
            $table->integer('id_user');
            $table->foreign('id_user')
                ->references('id')
                ->on('tbl_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('fullname', 255);
            $table->string('number_phone', 40);
            $table->string('address');
            $table->string('payment_method', 255);
            $table->integer('total_product_fee');
            $table->integer('transport_fee');
            $table->integer('total_money');
            $table->string('state', 255);
            $table->text('note') -> nullable();
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
        Schema::dropIfExists('tbl_orders');
    }
};
