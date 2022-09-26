<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Servicio;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pais');
            $table->enum('status', [Servicio::ACTIVO,Servicio::DESACTIVADO_TEMPORALMENTE,Servicio::INACTIVO])->default(Servicio::ACTIVO);
            $table->unsignedBigInteger('estudio_id')->nullable();
            $table->foreign('estudio_id')->references('id')->on('estudios')->onDelete('set null');
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
        Schema::dropIfExists('servicios');
    }
}
