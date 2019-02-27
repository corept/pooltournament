@extends('layout')

@section('content')
  <div class="card mt-5">
    <div class="card-header">
      <h2 class="font-weight-bold">{{ $friend->name }}</h2>
      <h3 class="font-weight-light mt-4">{{ $friend->wins->count() }} Wins / {{ $friend->losses->count() }} Losses</h3>

      <table class="table w-50 mx-auto mt-4">
        <thead>
          <tr>
            <th class="text-center">Ranking</th>
            <th class="text-center">Points</th>
            <th class="text-center">Balls</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $friend->rank() }}</td>
            <td>{{ $friend->points }}</td>
            <td>{{ $friend->balls }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-body">
      <table class="table table-hover mt-4">
        <thead class="thead-dark">
        <tr>
          <th>Date</th>
          <th>Winner</th>
          <th>Loser</th>
        </tr>
        </thead>
        <tbody>
        @foreach($friend->matches() as $match)
          <tr onmouseover="style.cursor='pointer'" onclick="window.location='/match/{{ $match->id }}'">
            <td>{{ $match->date->format('d/m/Y') }}</td>
            <td><a href="/friend/{{ $match->winner->id }}">{{ $match->winner->name }}</a></td>
            <td><a href="/friend/{{ $match->loser->id }}">{{ $match->loser->name }}</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
