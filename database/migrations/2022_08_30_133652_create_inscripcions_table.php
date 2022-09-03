<?php

use App\Models\Inscripcion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('fecha_categoria_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->unsignedbigInteger('inscripcionable_id');
            $table->string('inscripcionable_type');
            
            $table->enum('estado',[Inscripcion::BORRADOR,Inscripcion::PAGADA,Inscripcion::ACTIVA,Inscripcion::USADA])->default(Inscripcion::BORRADOR);

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
        Schema::dropIfExists('inscripcions');
    }
}
