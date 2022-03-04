<?php

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
        // La descripción de la tarea, el usuario asignado, la fecha máxima de ejecución.
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Usuario creo
            $table->unsignedBigInteger('created_user_id');

            // Usuario asignado
            $table->unsignedBigInteger('assigned_user_id');

            $table->string('task_description', 150);
            $table->date('max_date_execution');

            $table->timestamps();

            // FK
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->foreign('assigned_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
