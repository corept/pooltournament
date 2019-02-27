<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
  public function show(Friend $friend)
  {
    return view('friend.show', compact('friend'));
  }
}
