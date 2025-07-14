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
    Schema::table('jabatan_riwayats', function (Blueprint $table) {
        $table->date('tanggal_masuk')->nullable()->after('jabatan_baru');
        $table->date('tanggal_berakhir')->nullable()->after('tanggal_masuk');
    });
}

public function down()
{
    Schema::table('jabatan_riwayats', function (Blueprint $table) {
        $table->dropColumn(['tanggal_masuk', 'tanggal_berakhir']);
    });
}

};
