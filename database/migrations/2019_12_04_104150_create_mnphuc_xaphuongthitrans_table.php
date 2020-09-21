<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMnphucXaphuongthitransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mnphuc_xaphuongthitrans', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->string('name');
            $table->string('type');
            $table->unsignedBigInteger('huyenId');
            $table->foreign('huyenId')->references('id')->on('mnphuc_quanhuyens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mnphuc_xaphuongthitrans');
    }
}
