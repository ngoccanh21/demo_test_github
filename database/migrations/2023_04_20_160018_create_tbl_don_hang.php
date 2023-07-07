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
        Schema::create('tbl_don_hang', function (Blueprint $table) {
            $table->Increments('don_hang_id');
            $table->integer('khachhang_id');
            $table->integer('shipping_id');
            $table->integer('payment_id');
            $table->string('don_hang_thanhtien');
            $table->string('don_hang_trangthai');
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
        Schema::dropIfExists('tbl_don_hang');
    }
};
