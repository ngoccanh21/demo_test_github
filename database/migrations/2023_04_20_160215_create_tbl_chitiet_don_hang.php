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
        Schema::create('tbl_chitiet_don_hang', function (Blueprint $table) {
            $table->Increments('chitiet_don_hang_id');
            $table->integer('don_hang_id');
            $table->integer('product_id');
            $table->string('product_ten');
            $table->string('product_anh');
            $table->string('product_size');
            $table->string('product_giaban');
            $table->integer('product_quantity');
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
        Schema::dropIfExists('tbl_chitiet_don_hang');
    }
};
