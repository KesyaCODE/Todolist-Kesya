<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
// ...existing code...
public function up()
{
    Schema::table('tb_todo', function (Blueprint $table) {
        $table->string('judul')->nullable()->change();
    });
}
// ...existing code...
};
