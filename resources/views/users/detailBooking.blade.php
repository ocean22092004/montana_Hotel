@extends('users.default')

@section('content')
<div class="bg-dark" style="height:150px">
    {{-- <h3>Laxaries Rooms</h3> --}}
</div>
<div class="container">
    <div style="height: 600px">
        <table class="table mt-3 mb-5" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Room</th>
                <th scope="col">Check in date</th>
                <th scope="col">Check out date</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listBooking as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->room_id}}</td>
                    <td>{{$item->check_in_date}}</td>
                    <td>{{$item->check_out_date}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->status}}</td>
                  </tr>   
                @endforeach
            </tbody>
          </table>
    </div>
    
</div>
@endsection
