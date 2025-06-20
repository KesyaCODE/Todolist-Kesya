<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

// filepath: database/migrations/xxxx_xx_xx_xxxxxx_create_tb_login_table.php
// ...existing code...
public function up()
{
    Schema::create('tb_login', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pengguna');
        $table->string('kata_sandi');
        $table->timestamps();
    });
}
// ...existing code...
};
