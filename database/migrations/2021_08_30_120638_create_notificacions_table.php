<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluacion_id');
            $table->boolean('activa')->nullable()->default(true);
            $table->boolean('leida')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('evaluacion_id')->references('id')->on('evaluacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacions');
    }
}
