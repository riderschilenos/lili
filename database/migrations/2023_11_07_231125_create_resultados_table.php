<?php

use App\Models\Resultado;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();

            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table ->foreignId('evento_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');
            
            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();

            $table->enum('status',[Resultado::BORRADOR,Resultado::PUBLICADO, RESULTADO::CERRADO])->default(RESULTADO::BORRADOR);


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
        Schema::dropIfExists('resultados');
    }
}
