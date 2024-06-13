<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',50);
            $table->string('alamat',100);
            $table->string('no_hp',18);
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id_menu')->on('tbmenu')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('status',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
