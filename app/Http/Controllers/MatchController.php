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
    return view('match.create');
  }

  public function store()
  {
    $validator = request()->validate([
      'winner_id' => 'integer',
      'loser_id' => 'integer',
      'remaining_balls' => 'integer',
      'forfeit' => 'boolean',
      'date' => 'date'
    ]);

    Match::create($validator);

    return redirect('/');
  }
}
