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
            $table->foreignId('profesor_id')->constrained('userinstitucionals');
            $table->foreignId('estudiante_id')->constrained('userinstitucionals');
            $table->foreignId('semestre_id')->constrained();
            $table->foreignId('estado_id')->constrained();
            $table->foreignId('tipoproceso_id')->nullable()->constrained();
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
