<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  protected $guarded = [], $dates = ['date'];

  protected static function boot()
  {
    parent::boot();

    static::created(function ($match) {
      $match->winner->update(['points' => $match->winner->points + 3]);

      if (!$match->forfeit) {
        $match->loser->update(['points' => $match->loser->points + 1, 'balls' => $match->loser->balls + $match->remaining_balls]);
      }
    });
  }

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
