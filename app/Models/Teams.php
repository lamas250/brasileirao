<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
  protected $table = 'teams';
  protected $fillable = [
    'name',
    'points',
    'played',
    'won',
    'drawn',
    'lost',
    'goals_for',
    'goals_against',
    'goal_difference',
    'red_card',
    'yellow_card'
  ];
}
