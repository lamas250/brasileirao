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
      $table->integer('points')->default(0);
      $table->integer('played')->default(0);
      $table->integer('won')->default(0);
      $table->integer('draw')->default(0);
      $table->integer('lost')->default(0);
      $table->integer('goals_for')->default(0);
      $table->integer('goals_against')->default(0);
      $table->integer('goal_difference')->default(0);
      $table->integer('red_card')->default(0);
      $table->integer('yellow_card')->default(0);
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
