<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_barangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang')->unsigned();
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->date('waktu');
            $table->foreign('id_barang')->references('id')
                ->on('barangs')->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('pinjam_barangs');
    }
}
