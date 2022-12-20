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
        Schema::create('tbl_address_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('fullname', 255);
            $table->text('address_default');
            $table->string('number_phone', 20);
            $table->tinyInteger('state');
            $table->foreign('id_user')
                ->references('id')
                ->on('tbl_users')
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
        Schema::dropIfExists('tbl_address_user');
    }
};
