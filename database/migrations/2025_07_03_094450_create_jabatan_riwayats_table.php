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
    Schema::create('jabatan_riwayats', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
    $table->string('jabatan_lama')->nullable();
    $table->string('jabatan_baru');
    $table->date('tanggal_berubah');
    $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('jabatan_riwayats');
    }
};
