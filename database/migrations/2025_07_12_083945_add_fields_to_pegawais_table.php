<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('pegawais', function (Blueprint $table) {
        if (!Schema::hasColumn('pegawais', 'pangkat')) {
            $table->string('pangkat')->nullable(); // hanya tambah ini
        }
    });
}

public function down()
{
    Schema::table('pegawais', function (Blueprint $table) {
        $table->dropColumn('pangkat');
    });
}

};
