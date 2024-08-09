@extends('admin.default')
@section('content')
<div class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

    <div class="card card-default">
        <div class="card-header">
          <h2>Edit Schedule</h2>
          <a href="{{route('schedules.index')}}" class="btn mdi">Back to list</a>
        </div>
        <div class="card-body">
            <form action="{{route('schedules.update', ['id'=>$schedule->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" class="form-control" placeholder="Name amenity" name="name" value="{{$schedule->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">start</label>
                    <input type="datetime-local" step="1" class="form-control" name="start" value="{{$schedule->start}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">end</label>
                    <input type="datetime-local" step="1" class="form-control" name="end" value="{{$schedule->end}}">
                </div>
                <div class="form-group">
                  <label>Room </label>
                  <select class="form-control" name="room_id">
                    @foreach ($listRoom as $item)
                        <option value="{{$item->id}}" 
                            @if($item->id == $schedule->id) selected
                            @endif
                            >{{$item->id}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-footer mt-6">
                  <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                  {{-- <button type="submit" class="btn btn-light btn-pill">Cancel</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@endsection