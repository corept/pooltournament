@extends('layout')

@section('content')
  <a href="/match/create" class="btn btn-primary mt-3"><i class="fas fa-plus"></i>&nbsp;New Match</a>

  <div class="card mt-5">
    <div class="card-header">
      <h3>Ranking</h3>
    </div>
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Points</th>
          <th>Total Remaining Balls</th>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $key => $player)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>@if($key === 0)<i class="fas fa-crown"></i>@endif {{ $player->name }}</td>
            <td>{{ $player->points }}</td>
            <td>{{ $player->balls }}</td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <td colspan="100%">{{ $players->links() }}</td>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <div class="card mt-5">
    <div class="card-header">
      <h3>Matches</h3>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
          <th>Date</th>
          <th>Winner</th>
          <th>Loser</th>
        </tr>
        </thead>
        <tbody>

        @foreach($matches as $match)
          <tr onmouseover="style.cursor='pointer'" onclick="window.location='/match/{{ $match->id }}'">
            <td>{{ $match->date->format('d/m/Y') }}</td>
            <td><a href="/friend/{{ $match->winner->id }}">{{ $match->winner->name }}</a></td>
            <td><a href="/friend/{{ $match->loser->id }}">{{ $match->loser->name }}</a></td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <td colspan="100%">{{ $matches->links() }}</td>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>

@endsection
