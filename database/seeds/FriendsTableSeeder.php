<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FriendsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    for ($i = 0; $i < 15; $i++) {
      \App\Friend::create([
        'name' => $faker->name,
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
  }
}
