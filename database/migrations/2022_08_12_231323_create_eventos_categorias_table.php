<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_categorias', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('evento_id')
            ->constrained()
            ->onDelete('cascade');

            $table  ->foreignId('categoria_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('inscripcion')->Nullable();
            $table->string('limite')->Nullable();



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
        Schema::dropIfExists('eventos_categorias');
    }
}
