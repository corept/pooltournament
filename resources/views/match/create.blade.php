@extends('layout')

@section('content')

  <div class="card mt-5">
    <div class="card-header">
      <h3>New Match</h3>
    </div>
    <div class="card-body">
      <form action="/match" method="POST">
      @csrf
        <div class="form-group">
          <label for="remaining_balls">Remaining Balls</label>
          <input type="number" name="remaining_balls" id="remaining_balls" min="0" max="7" value="0" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="forfeit">Was the game forfeited?</label>
          <select name="forfeit" id="forfeit" class="form-control">
            <option value="true">True</option>
            <option value="false" selected>False</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit A New Match</button>
      </form>
    </div>
  </div>

@endsection
