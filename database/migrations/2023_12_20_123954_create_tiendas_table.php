<?php

use App\Models\Tienda;
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
            $table->string('slug');
            $table->text('descripcion')->nullable();
            $table->text('logo')->nullable();
            $table->text('fono')->nullable();
            $table->text('tour360')->nullable();
            $table->enum('status',[Tienda::BORRADOR,Tienda::REVISION,Tienda::PUBLICADO])->default(Tienda::BORRADOR);

            $table->text('ubicacion');
            $table->text('cord-x')->nullable();
            $table->text('cord-y')->nullable();

            $table  ->foreignId('disciplina_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table->string('nro_cuenta')->nullable();
            $table->string('tipo_cuenta')->nullable();
            $table->string('rut')->nullable();
            $table->string('banco')->nullable();
            
            $table  ->foreignId('user_id')
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
        Schema::dropIfExists('tiendas');
    }
};
