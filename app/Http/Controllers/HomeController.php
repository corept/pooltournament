<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $friends = \App\Friend::orderBy('points', 'DESC')->orderBy('balls', 'ASC')->get();

    $matches = \App\Match::when(request()->filled('search'), function($query) {
      return $query->where('winner_id', request()->input('search'))
        ->orWhere('loser_id', request()->input('search'));
    })
      ->orderBy('date', 'DESC')
      ->paginate(20);

    return view('homepage', compact('friends', 'matches'));
  }
}
