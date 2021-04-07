<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('teams', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('image');
      $table->integer('points')->nullable();
      $table->integer('played')->nullable();
      $table->integer('won')->nullable();
      $table->integer('drawn')->nullable();
      $table->integer('lost')->nullable();
      $table->integer('goals_for')->nullable();
      $table->integer('goals_against')->nullable();
      $table->integer('goal_difference')->nullable();
      $table->integer('red_card')->nullable();
      $table->integer('yellow_card')->nullable();
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
    Schema::dropIfExists('teams');
  }
}
