<?php

use App\Models\Vehiculo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('cilindrada')->nullable();
            $table->integer('aro_front')->nullable();
            $table->integer('aro_back')->nullable();
            $table->integer('año')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status',[Vehiculo::BORRADOR,Vehiculo::REVISION,Vehiculo::PUBLICADO])->default(Vehiculo::BORRADOR);
            $table->integer('precio')->nullable();
            
            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table ->foreignId('vehiculo_type_id')
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
        Schema::dropIfExists('vehiculos');
    }
}
