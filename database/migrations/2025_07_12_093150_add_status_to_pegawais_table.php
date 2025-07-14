<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('pegawais', function (Blueprint $table) {
        $table->string('status')->nullable()->default(null)->change();
    });
}

public function down()
{
    Schema::table('pegawais', function (Blueprint $table) {
        $table->string('status')->default('Aktif')->change();
    });
}
};
