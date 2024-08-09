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
          <h2>Edit Booking</h2>
          <a href="{{route('bookings.index')}}" class="btn mdi">Back to list</a>
        </div>
        <div class="card-body">
            <form action="{{route('bookings.update',['id'=>$booking->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">User name</label>
                  <input type="text" class="form-control" placeholder="Name amenity" value="{{$user->name}}" readonly>
                  <input type="text" class="form-control" placeholder="Name amenity" name="user_id" value="{{$user->id}}" hidden readonly>
                  <input type="text" class="form-control" placeholder="Name amenity" name="booking_id" value="{{$booking->id}}" hidden readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Room</label>
                    <input type="text" class="form-control" placeholder="Name amenity" name="room_id" value="{{$booking->room_id}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Check in date</label>
                    <input type="text" class="form-control" placeholder="Name amenity" name="check_in_date" value="{{$booking->check_in_date}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Check out date</label>
                    <input type="text" class="form-control" placeholder="Name amenity" name="check_out_date" value="{{$booking->check_out_date}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Total price</label>
                    <input type="text" class="form-control" placeholder="Name amenity" name="total_price" value="{{$booking->total_price}}" readonly>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option 
                    @if ($booking->status == 'Waiting for room')
                        selected
                    @endif
                     value="Waiting for room">Waiting for room</option>
                    <option
                    @if ($booking->status == 'Room received')
                        selected
                    @endif
                     value="Room received">Room received</option>
                    <option
                    @if ($booking->status == 'Paid')
                        selected
                    @endif
                     value="Paid">Paid</option>
                    <option
                    @if ($booking->status == 'Done')
                        selected
                    @endif
                    value="Done">Done</option>
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