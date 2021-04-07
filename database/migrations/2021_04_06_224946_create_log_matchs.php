<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMatchs extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('log_matchs', function (Blueprint $table) {
      $table->id();
      $table->foreignId('home_id')->constrained('teams');
      $table->foreignId('guest_id')->constrained('teams');
      $table->foreignId('winner')->constrained('teams');
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
    Schema::dropIfExists('log_matchs');
  }
}
