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
          <h2>Edit Amenity</h2>
          <a href="{{route('amenities.index')}}" class="btn mdi">Back to list</a>
        </div>
        <div class="card-body">
            <form action="{{route('amenities.update',['id'=>$amenity->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" class="form-control" placeholder="Name amenity" name="name" value="{{$amenity->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Icon</label>
                    <input type="text" class="form-control" placeholder="Name amenity" name="icon" value="{{$amenity->icon}}">
                </div>
                <div class="form-group">
                  <label>Room type</label>
                  <select class="form-control" name="room_type_id">
                    @foreach ($listRoomType as $item)
                        <option value="{{$item->id}}" 
                            @if($item->id == $amenity->id) selected
                            @endif
                            >{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-footer mt-6">
                  <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                  <button type="submit" class="btn btn-light btn-pill">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection