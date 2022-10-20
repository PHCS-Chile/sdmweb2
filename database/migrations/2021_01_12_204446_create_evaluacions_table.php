<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateEvaluacionsTable
 * @version 1
 */
class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id();
            $table->string('movil')->nullable();
            $table->text('connid')->nullable();
            $table->datetime('fecha_grabacion')->nullable();
            $table->string('nombre_ejecutivo')->nullable();
            $table->string('rut_ejecutivo')->nullable();
            $table->string('nombre_supervisor')->nullable();
            $table->string('rut_supervisor')->nullable();
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->integer('epa')->nullable();
            $table->text('image_path')->nullable();
            $table->decimal('penc', 4, 1)->nullable();
            $table->decimal('pecu', 4, 1)->nullable();
            $table->decimal('pecn', 4, 1)->nullable();
            $table->decimal('pecc', 4, 1)->nullable();
            $table->decimal('pf', 4, 1)->nullable();
            $table->text('comentario_interno')->nullable();
            $table->text('comentario_calidad')->nullable();
            $table->text('respuesta_ejecutivo')->nullable();
            $table->string('user_completa')->nullable();
            $table->datetime('fecha_completa')->nullable();
            $table->string('user_supervisor')->nullable();
            $table->datetime('fecha_supervision')->nullable();
            $table->decimal('ici', 4, 1)->nullable();
            $table->datetime('fecha_ici')->nullable();
            $table->string('user_ici')->nullable();
            $table->decimal('c_penc', 4, 1)->nullable();
            $table->decimal('c_pec', 4, 1)->nullable();
            $table->decimal('c_pecu', 4, 1)->nullable();
            $table->decimal('c_pecn', 4, 1)->nullable();
            $table->decimal('c_pecc', 4, 1)->nullable();
            $table->decimal('c_fcr', 4, 1)->nullable();
            $table->datetime('fecha_subida')->nullable();
            $table->datetime('fecha_evaluacion_centro')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('asignacion_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedInteger('estado_conversacion')->nullable();
            $table->unsignedInteger('estado_reporte')->nullable();
            $table->unsignedInteger('nivel_ec')->nullable();// 1 = Error Leve - 2 = Error Medio - 3 = Error Grave
            $table->string('tipo_gestion')->nullable();
            $table->string('sub_estudio')->nullable();
            $table->text('c_descripcion_caso')->nullable();
            $table->text('c_respuesta_ejecutivo')->nullable();
            $table->text('c_retroalimentacion')->nullable();
            $table->text('comentario_estado')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('evaluacions');
    }
}
