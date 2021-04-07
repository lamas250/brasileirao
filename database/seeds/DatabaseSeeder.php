<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('teams')->insert([
      'name' => 'América-MG',
      'image' => '/assets/america.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Athletico-PR',
      'image' => '/assets/athletico.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Atlético-GO',
      'image' => '/assets/AtleticoGO.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Atlético-MG',
      'image' => '/assets/atletico-mg.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Bahia',
      'image' => '/assets/bahia.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Bragantino',
      'image' => '/assets/svg.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Ceará',
      'image' => '/assets/ceara.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Chapecoense',
      'image' => '/assets/chapecoense.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Corinthians',
      'image' => '/assets/Corinthians.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Cuiabá',
      'image' => '/assets/Cuiaba_EC.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Flamento',
      'image' => '/assets/Flamengo.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Fluminense',
      'image' => '/assets/fluminense.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Fortaleza',
      'image' => '/assets/optimised.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Grêmio',
      'image' => '/assets/gremio.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Internacional',
      'image' => '/assets/internacional.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Juventude',
      'image' => '/assets/juventude.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Palmeiras',
      'image' => '/assets/Palmeiras.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Santos',
      'image' => '/assets/santos.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'São Paulo',
      'image' => '/assets/sao-paulo.svg'
    ]);
    DB::table('teams')->insert([
      'name' => 'Sport',
      'image' => '/assets/sport.svg'
    ]);
  }
}
