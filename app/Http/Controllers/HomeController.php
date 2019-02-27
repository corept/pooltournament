<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $players = \App\Friend::orderBy('points', 'DESC')->orderBy('balls', 'ASC')->paginate(10, ['*'], 'player');

    $matches = \App\Match::orderBy('date', 'DESC')->paginate(20, ['*'], 'match');

    return view('homepage', compact('players', 'matches'));
  }
}
