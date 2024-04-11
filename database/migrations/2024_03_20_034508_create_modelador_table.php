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
        Schema::create('modeladors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipoetapa_id')->nullable()->constrained();
            $table->json('modelo');
            $table->json('item');
            $table->json('dependencia_guardado');
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
        Schema::dropIfExists('modelador');
    }
};
