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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id();

            $table->text('nombre');
            $table->text('descripcion')->Nullable();
            $table->text('logo')->Nullable();
            $table->text('tour360')->Nullable();

            $table->text('ubicación');
            $table->text('cord-x')->Nullable();
            $table->text('cord-x')->Nullable();

            $table  ->foreignId('disciplina_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table->string('nro_cuenta')->Nullable();
            $table->string('tipo_cuenta')->Nullable();
            $table->string('rut')->Nullable();
            $table->string('banco')->Nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set nut');

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
        Schema::dropIfExists('tiendas');
    }
};
