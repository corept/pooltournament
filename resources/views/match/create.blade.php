@extends('layout')

@section('content')

  <div class="card mt-5">
    <div class="card-header">
      <h3>New Match</h3>
    </div>
    <div class="card-body">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div>{{$error}}</div>
        @endforeach
      @endif

      <form action="/match" method="POST" autocomplete="off">
      @csrf
        <div class="form-group">
          <label for="winner">Winner</label>
          <select name="winner_id" id="winner" class="form-control" required>
            <option value="" disabled selected>Pick a winner...</option>
          @foreach($friends as $friend)
              <option value="{{ $friend->id }}">{{ $friend->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="loser">Loser</label>
          <select name="loser_id" id="loser" class="form-control" required>
            <option value="" disabled selected>...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="date">Date</label>
          <input type="text" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="remaining_balls">Remaining Balls</label>
          <input type="number" name="remaining_balls" id="remaining_balls" min="0" max="7" value="0" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="forfeit">Was the game forfeited?</label>
          <select name="forfeit" id="forfeit" class="form-control" required>
            <option value="1">Yes</option>
            <option value="0" selected>No</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit A New Match</button>
      </form>
    </div>
  </div>

@endsection

@section('css')
  <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" />
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js"></script>
  <script>
    $(function() {
      $('#date').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate()),
        uiLibrary: 'bootstrap4'
      });

      $('#winner').change(() => {
        $.get( "/api/filter/" + $(this).find("option:selected").attr('value'), friends => {

          $('#loser')[0].options.length = 0;

          Object.keys(friends).forEach(function (key){
            $('#loser').append('<option value="' + friends[key].id + '">' + friends[key].name + '</option>');
          });
        });
      });
    });
  </script>
@endsection
