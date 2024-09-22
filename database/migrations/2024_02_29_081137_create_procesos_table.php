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
            $table->foreignId('docente_id')->nullable()->constrained('userinstitucionals')->cascadeOnDelete();;
            $table->foreignId('estudiante_id')->constrained('userinstitucionals')->cascadeOnDelete();;
            $table->foreignId('semestre_id')->constrained()->nullable()->onDelete('no action');
            $table->foreignId('estado_id')->constrained()->nullable()->onDelete('no action');
            $table->foreignId('tipoproceso_id')->nullable()->constrained()->nullable()->onDelete('no action');
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
