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
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docente_id')->nullable()->constrained('userinstitucionals');
            $table->foreignId('estudiante_id')->constrained('userinstitucionals');
            $table->foreignId('semestre_id')->constrained()->nullable();
            $table->foreignId('estado_id')->constrained()->nullable();
            $table->foreignId('tipoproceso_id')->nullable()->constrained()->nullable();
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
        Schema::dropIfExists('procesos');
    }
};
