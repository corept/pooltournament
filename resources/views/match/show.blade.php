@extends('layout')

@section('content')

  <div class="card mt-5">
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
        <tr>
          <th>Date</th>
          <th>Winner</th>
          <th>Loser</th>
          <th>Remaining Balls</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>{{ $match->date->format('d/m/Y') }}</td>
          <td><a href="/friend/{{ $match->winner->id }}">{{ $match->winner->name }}</a></td>
          <td><a href="/friend/{{ $match->loser->id }}">{{ $match->loser->name }}</a></td>
          <td>{{ $match->remaining_balls }}</td>
          <td><i class="fas fa-flag" style="color: @if($match->forfeit) indianred @else green @endif"></i></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection