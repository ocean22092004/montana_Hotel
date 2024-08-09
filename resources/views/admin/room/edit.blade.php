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
          <h2>Edit Room</h2>
          <a href="{{route('rooms.index')}}" class="btn mdi">Back to list</a>
        </div>
        <div class="card-body">
            <form action="{{route('rooms.update', ['id'=>$room->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">Room id</label>
                  <input type="number" class="form-control" placeholder="Name amenity" name="id" value="{{$room->id}}">
                </div>
                <div class="form-group">
                    <label>Room type</label>
                    <select class="form-control" name="room_type_id">
                      @foreach ($listRoomType as $item)
                          <option value="{{$item->id}}" 
                              @if($item->id == $room->room_type_id) selected
                              @endif
                              >{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Bed count</label>
                    <input type="number" class="form-control" placeholder="Name amenity" name="bed_count" value="{{$room->bed_count}}">
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Max Occupancy</label>
                    <input type="number" class="form-control" placeholder="Name amenity" name="max_occupancy" value="{{$room->max_occupancy}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price per hour</label>
                    <input type="number" class="form-control" placeholder="Name amenity" name="price_per_hour" value="{{$room->price_per_hour}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price per night</label>
                    <input type="number" class="form-control" placeholder="Name amenity" name="price_per_night" value="{{$room->price_per_night}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price per day</label>
                    <input type="number" class="form-control" placeholder="Name amenity" name="price_per_day" value="{{$room->price_per_day}}">
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