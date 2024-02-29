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
            $table->foreignId('userinstitucional_id')->constrained();
            $table->foreignId('semestre_id')->constrained();
            $table->foreignId('estado_id')->constrained();
            $table->foreignId('comentario_id')->nullable()->constrained();
            $table->foreignId('matricula_id')->constrained('files');
            $table->foreignId('record_id')->constrained('files');
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
