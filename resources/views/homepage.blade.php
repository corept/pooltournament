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
        @foreach($friends as $key => $friend)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td><a href="/friend/{{ $friend->id }}">@if($key === 0)<i class="fas fa-crown"></i>@endif {{ $friend->name }}</a></td>
            <td>{{ $friend->points }}</td>
            <td>{{ $friend->balls }}</td>
          </tr>
        @endforeach
        </tbody>
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

        <form action="/" method="GET">
          <div class="row mb-3">
            <div class="col-10">
              <select name="search" class="form-control">
                <option value="">All</option>
                @foreach($friends as $friend)
                  <option value="{{ $friend->id }}" @if(isset($_GET['search']) && $_GET['search'] == $friend->id) selected @endif>{{ $friend->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-secondary w-100"><i class="fas fa-search"></i>&nbsp;Search</button>
            </div>
          </div>
        </form>

        @foreach($matches as $match)
          <tr onmouseover="style.cursor='pointer'" onclick="window.location='/match/{{ $match->id }}'">
            <td>{{ $match->date->format('d-m-Y') }}</td>
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
