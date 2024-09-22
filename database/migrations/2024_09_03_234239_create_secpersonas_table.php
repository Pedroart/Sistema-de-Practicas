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
        Schema::create('secpersonas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->constrained()->nullable();
            $table->foreignId('supervisor_id')->nullable()->constrained('userinstitucionals')->cascadeOnDelete();;
            $table->foreignId('estudiante_id')->constrained('userinstitucionals')->cascadeOnDelete();;
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
        Schema::dropIfExists('secpersonas');
    }
};
