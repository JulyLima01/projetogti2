<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('periodo')->nullable();
            $table->string('professor')->nullable();
            $table->string('qtdAulas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aula');
    }
};
