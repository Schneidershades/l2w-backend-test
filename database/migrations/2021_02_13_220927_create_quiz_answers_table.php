<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('quiz_id')->nullable();
            $table->integer('quiz_session_id')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('timer')->nullable();
            $table->integer('points')->nullable();
            $table->integer('attempts')->default(0);
            $table->integer('session')->default(0);
            $table->integer('correct')->default(0);
            $table->integer('fail')->default(0);
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('quiz_answers');
    }
}
