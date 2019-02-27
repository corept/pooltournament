<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MatchesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    for ($i = 0; $i < 30; $i++) {
      $friends = \App\Friend::all()->random(2);

      \App\Match::firstOrCreate([
        'winner_id' => $friends[0]->id,
        'loser_id' => $friends[1]->id
      ], [
        'remaining_balls' => $faker->numberBetween(1, 7),
        'forfeit' => false,
        'date' => $faker->dateTime(now())
      ]);
    }

    foreach (\App\Match::all() as $match) {
      $match->winner->update(['points' => $match->winner->points + 3]);

      if (!$match->forfeit) {
        $match->loser->update(['points' => $match->loser->points + 1, 'balls' => $match->loser->balls + $match->remaining_balls]);
      }
    }
  }
}
