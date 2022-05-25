<?php

use App\Models\Evento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('status',[Evento::BORRADOR,Evento::REVISION,Evento::PUBLICADO])->default(Evento::BORRADOR);
            $table->string('slug');

            $table->string('fecha');
            $table->string('ubicacion');

            $table  ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table  ->foreignId('disciplina_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');


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
        Schema::dropIfExists('eventos');
    }
}
