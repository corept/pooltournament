<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
  protected $guarded = [];

  public function matches()
  {
    return Match::where('winner_id', $this->id)->orWhere('loser_id', $this->id)->orderBy('date', 'DESC')->get();
  }

  public function wins()
  {
    return $this->hasMany('App\Match', 'winner_id');
  }

  public function losses()
  {
    return $this->hasMany('App\Match', 'loser_id');
  }

  public function rank()
  {
    return Friend::orderBy('points', 'DESC')->orderBy('balls', 'ASC')->get()->where('id', $this->id)->keys()->first() + 1;
  }
}
