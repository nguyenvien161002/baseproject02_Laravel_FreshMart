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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->integer('id') -> primary();
            $table->string('fullname', 255);
            $table->string('email', 255);
            $table->string('avatar', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('confirm_password', 255)->nullable();
            $table->tinyInteger('state');
            $table->string('token', 100);
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
        Schema::dropIfExists('tbl_users');
    }
};
