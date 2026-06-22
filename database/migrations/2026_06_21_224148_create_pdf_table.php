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
        Schema::create('pdf', function (Blueprint $table) {
            $table->id();
            $table->foreignId("fk_usuario_envio")->constrained("usuario")->onDelete("cascade");
            $table->foreignId("fk_usuario_recebido")->constrained("usuario")->onDelete("cascade");;
            $table->string('titulo');
            $table->string('status');
            $table->dateTime("data_envio");
            $table->dateTime("data_recebido");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdf');
    }
};
