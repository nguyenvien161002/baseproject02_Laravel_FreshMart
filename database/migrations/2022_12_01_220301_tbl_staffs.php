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
        Schema::create('tbl_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staff_name', 255);
            $table->string('password', 255);
            $table->string('confirm_password', 255);
            $table->unsignedInteger('id_authorization');
            $table->foreign('id_authorization')
                ->references('id')
                ->on('tbl_authorization')
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
        Schema::dropIfExists('tbl_staffs');
    }
};
