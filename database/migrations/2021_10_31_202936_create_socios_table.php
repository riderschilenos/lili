<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id();

            $table->string('rut');
            $table->string('born_date');
            $table->string('prevision');
            $table->string('nro');

            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table  ->foreignId('disciplina_id')
            ->constrained()
            ->onDelete('cascade');



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
        Schema::dropIfExists('socios');
    }
}
