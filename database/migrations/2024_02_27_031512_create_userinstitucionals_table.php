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
        Schema::create('userinstitucionals', function (Blueprint $table) {
            $table->id();
            $table->char('codigo', 10)->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullable();
            $table->foreignId('personas_id')->nullable()->constrained()->nullable();
            $table->foreignId('escuela_id')->nullable()->constrained()->nullable();
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
        Schema::dropIfExists('userinstitucionals');
    }
};
