@extends('admin.default')
@section('title')
    bookings
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Bookings</h2>
          <a href="{{route('amenities.create')}}" class="btn mdi">Add Booking</a>
        </div>
        <div class="card-body">
          
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Room</th>
                <th>Check in date</th>
                <th>Check out date</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listBooking as $items)
                    
                
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->loadAllUser->name}}</td>
                    <td>{{$items->loadAllRoom->id}}</td>
                    <td>{{$items->check_in_date}}</td>
                    <td>{{$items->check_out_date}}</td>
                    <td>{{$items->total_price}}</td>
                    <td>{{$items->status}}</td>
                    <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('bookings.edit',['id'=>$items->id])}}">Edit</a>
                        <form action="{{route('bookings.destroy',['id'=>$items->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</button>
                        </form>
                        {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$listBooking->links()}}
        </div>
    </div>
</div>

@endsection