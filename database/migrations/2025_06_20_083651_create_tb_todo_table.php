<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// filepath: database/migrations/xxxx_xx_xx_xxxxxx_create_tb_todo_table.php
// ...existing code...
public function up()
{
    Schema::create('tb_todo', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->unsignedBigInteger('tugas_dari');
        $table->unsignedBigInteger('tugas_untuk');
        $table->timestamps();

        $table->foreign('tugas_dari')->references('id')->on('tb_pegawai');
        $table->foreign('tugas_untuk')->references('id')->on('tb_pegawai');
    });
}
// ...existing code...
};
