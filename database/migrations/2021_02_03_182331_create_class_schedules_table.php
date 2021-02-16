<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('timer')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('satisfactory')->default(false);
            $table->boolean('comment')->default(false);
            $table->string('status')->default('open');
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
        Schema::dropIfExists('class_schedules');
    }
}
