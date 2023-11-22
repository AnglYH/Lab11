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
        // Schema::create('pasajeros', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nombre', 30);
        //     $table->string('apellido', 30);
        //     $table->string('celular', 20);
        //     $table->integer('numero_asientos');
        //     $table->foreignIdFor(\App\Models\Vuelo::class, 'vuelo_id')->constrained('vuelos')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade');
        //     $table->timestamps();
        // });
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 20)->nullable();
            $table->string('apellido', 20)->nullable();
            $table->string('celular', 10)->nullable();
            $table->integer('numero_asientos')->nullable();
            $table->unsignedBigInteger('id_pasajero');
            $table->timestamps();

            $table->foreign('id_pasajero')->references('id')->on('vuelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasajeros');
    }
};
