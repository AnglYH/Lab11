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
        // Schema::create('vuelos', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('origen', 20);
        //     $table->string('destino', 20);
        //     $table->dateTime('fecha_vuelo');
        //     $table->time('hora_vuelo');
        //     $table->double('precio_vuelo');
        //     $table->integer('cantidad_pasajeros');
        //     $table->timestamps();
        // });
        Schema::create('vuelos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origen', 20);
            $table->string('destino', 20);
            $table->date('fecha_vuelo');
            $table->time('hora_vuelo');
            $table->integer('precio_vuelo');
            $table->string('cantidad_pasajeros', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
