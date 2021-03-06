<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
  public function show(Match $match)
  {
    return view('match.show', compact('match'));
  }

  public function create()
  {
    $friends = \App\Friend::all();

    return view('match.create', compact('friends'));
  }

  public function store()
  {
    //dd(request()->input('date'));

    $validator = request()->validate([
      'winner_id' => 'integer',
      'loser_id' => 'integer',
      'remaining_balls' => 'integer',
      'forfeit' => 'boolean',
      'date' => 'date_format:d-m-Y'
    ]);

    Match::create($validator);

    return redirect('/');
  }
}
