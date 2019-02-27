<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  protected $dates = ['date'], $guarded = [];

  public function winner()
  {
    return $this->belongsTo('App\Friend', 'winner_id');
  }

  public function loser()
  {
    return $this->belongsTo('App\Friend', 'loser_id');
  }

  public function setDateAttribute($value)
  {
    $this->attributes['date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value);
  }
}
