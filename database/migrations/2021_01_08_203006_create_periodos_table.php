<?php

use App\Models\Periodo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePeriodosTable
 * @version 1 (25/06/2021)
 */
class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('periodo_id')->index();
            $table->date('periodo_fecha');
            $table->enum('visible', [Periodo::ACTIVO,Periodo::INACTIVO])->default(Periodo::ACTIVO);
            $table->enum('status', [Periodo::ACTIVO,Periodo::INACTIVO])->default(Periodo::ACTIVO);
            $table->enum('web', [Periodo::ACTIVO,Periodo::INACTIVO])->default(Periodo::ACTIVO);
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
        Schema::dropIfExists('periodos');
    }
}
