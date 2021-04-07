<?php

namespace App\Repositories;

use App\Models\Teams;

class TeamsRepository
{
  private $model;

  public function __construct(Teams $model)
  {
    $this->model = $model;
  }

  public function findByOrdenates()
  {
    return $this->model->orderBy('points', 'DESC')
      ->orderBy('goal_difference', "DESC")
      ->orderBy('goals_for', 'DESC')
      ->orderBy('name', 'ASC')
      ->get();
  }

  public function findAll()
  {
    return $this->model->all();
  }

  public function saveMatch($data)
  {
    // dd("Repo", $data);
    $home_team = $this->model->find($data['home_team']);
    $guest_team = $this->model->find($data['guest_team']);

    if ($data['winning'] === 'home') {
      $home_team->points = $home_team->points + 3;
      $home_team->played = $home_team->played + 1;
      $home_team->won = $home_team->won + 1;
      $home_team->goals_for = $home_team->goals_for + $data['home_goals'];
      $home_team->goals_against = $home_team->goals_against + $data['guest_goals'];
      $home_team->goal_difference = $home_team->goal_difference + ($data['home_goals'] - $data['guest_goals']);


      $guest_team->played = $guest_team->played + 1;
      $guest_team->lost = $guest_team->lost + 1;
      $guest_team->goals_for = $guest_team->goals_for + $data['guest_goals'];
      $guest_team->goals_against = $guest_team->goals_against + $data['home_goals'];
      $guest_team->goal_difference = $guest_team->goal_difference + ($data['guest_goals'] - $data['home_goals']);
    }

    if ($data['winning'] === 'guest') {
      $guest_team->points = $guest_team->points + 3;
      $guest_team->played = $guest_team->played + 1;
      $guest_team->won = $guest_team->won + 1;
      $guest_team->goals_for = $guest_team->goals_for + $data['guest_goals'];
      $guest_team->goals_against = $guest_team->goals_against + $data['home_goals'];
      $guest_team->goal_difference = $guest_team->goal_difference + ($data['guest_goals'] - $data['home_goals']);


      $home_team->played = $home_team->played + 1;
      $home_team->lost = $home_team->lost + 1;
      $home_team->goals_for = $home_team->goals_for + $data['home_goals'];
      $home_team->goals_against = $home_team->goals_against + $data['guest_goals'];
      $home_team->goal_difference = $home_team->goal_difference + ($data['home_goals'] - $data['guest_goals']);
    }

    if ($data['winning'] === 'draw') {
      $guest_team->points = $guest_team->points + 1;
      $guest_team->played = $guest_team->played + 1;
      $guest_team->draw = $guest_team->draw + 1;
      $guest_team->goals_for = $guest_team->goals_for + $data['guest_goals'];
      $guest_team->goals_against = $guest_team->goals_against + $data['home_goals'];
      $guest_team->goal_difference = $guest_team->goal_difference + ($data['guest_goals'] - $data['home_goals']);


      $home_team->points = $home_team->points + 1;
      $home_team->played = $home_team->played + 1;
      $home_team->draw = $home_team->draw + 1;
      $home_team->goals_for = $home_team->goals_for + $data['home_goals'];
      $home_team->goals_against = $home_team->goals_against + $data['guest_goals'];
      $home_team->goal_difference = $home_team->goal_difference + ($data['home_goals'] - $data['guest_goals']);
    }

    $home_team->save();
    $guest_team->save();
  }
}
