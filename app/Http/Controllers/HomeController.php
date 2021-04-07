<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
  public function __construct(Teams $teams)
  {
    $this->teams = $teams;
  }

  public function index()
  {
    if (request()->ajax()) {
      return datatables()->of($this->teams->orderBy('points', 'DESC')->orderBy('goal_difference', "DESC")->orderBy('goals_for', 'DESC')->get())
        ->addColumn('title', function ($team) {
          $url = asset($team->image);
          return '<strong><img src="' . $url . '" border="0" width="25" class="img-rounded" align="center" style="margin-right: 15px;" />' . $team->name . '</strong>';
        })
        ->rawColumns(['title'])
        ->make(true);
    }
    return view('home');
  }

  public function store(Request $request)
  {
    $rules = array(
      'teste' => 'required',
    );

    $error =  Validator::make($request->all(), $rules);

    if ($error->fails()) {
      return response()->json(['errors' => $error->errors()->all()]);
    }
  }
}
