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
        Schema::create('ganadorsorteos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('inscripcion_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table->foreignId('evento_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table->string('name')->nullable();
            $table->string('nro_premio')->nullable();
            $table->string('premio')->nullable();

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
        Schema::dropIfExists('ganadorsorteos');
    }
};
