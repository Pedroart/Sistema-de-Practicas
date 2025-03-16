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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userinstitucional_id')->constrained()->nullable();
            $table->foreignId('semestre_id')->constrained()->nullable();
            $table->foreignId('estado_id')->constrained()->nullable();
            $table->foreignId('comentario_id')->nullable()->constrained()->nullable();
            $table->foreignId('matricula_id')->constrained('files')->onDelete('cascade');
            $table->foreignId('record_id')->constrained('files')->onDelete('cascade');
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
        Schema::dropIfExists('matriculas');
    }
};
