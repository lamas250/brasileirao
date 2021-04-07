<?php

namespace App\Http\Controllers;

use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
  public function __construct(TeamsRepository $teams)
  {
    $this->teams = $teams;
  }

  public function index()
  {
    if (request()->ajax()) {
      return datatables()->of($this->teams->findByOrdenates())
        ->addColumn('title', function ($team) {
          $url = asset($team->image);
          return '<strong><img src="' . $url . '" border="0" width="25" class="img-rounded" align="center" style="margin-right: 15px;" />' . $team->name . '</strong>';
        })
        ->rawColumns(['title'])
        ->make(true);
    }
    return view('home');
  }

  public function getTeams()
  {
    return $this->teams->findAll();
  }

  public function store(Request $request)
  {
    $rules = array(
      'home_team' => 'required',
      'guest_team' => 'required',
      'home_goals' => 'required',
      'guest_goals' => 'required',
    );

    $messages = array(
      'home_team.required'  => 'Selecione o time da casa.',
      'guest_team.required'  => 'Selecione o time visitante.',
      'home_goals.required'  => 'Informe os gols do time da casa.',
      'guest_goals.required'  => 'Informe os gols do visitante.',
    );

    $error =  Validator::make($request->all(), $rules, $messages);

    if ($error->fails()) {
      return response()->json(['errors' => $error->errors()->all()]);
    }

    $data = $request->except('_token');
    if ($data['home_goals'] > $data['guest_goals']) {
      $data['winning'] = 'home';
    } else if ($data['home_goals'] < $data['guest_goals']) {
      $data['winning'] = 'guest';
    } else {
      $data['winning'] = 'draw';
    }

    $this->teams->saveMatch($data);

    return response()->json(['success' => "Adicionado com sucesso"]);
  }
}
