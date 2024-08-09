@extends('admin.default')
@section('title')
    rooms
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Rooms</h2>
          <a href="{{route('rooms.create')}}" class="btn mdi">Add room</a>
        </div>
        <div class="card-body">
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Room</th>
                <th>Room Type</th>
                <th>Bed Count</th>
                <th>Max Occupancy</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listRoom as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->loadAllRoomType->name}}</td>
                    <td>{{$items->bed_count}}</td>
                    <td>{{$items->max_occupancy}}</td>
                    <td>
                        @if ($items->status == 'available')
                            <p class="bg-success text-white text-center">{{$items->status}}</p>
                        @elseif ($items->status == 'booked')
                            <p class="bg-warning text-dark text-center">{{$items->status}}</p>
                        @elseif ($items->status == 'occupied')
                            <p class="bg-secondary text-white text-center">{{$items->status}}</p>
                        @elseif ($items->status == 'housekeeping')
                            <p class="bg-info text-white text-center">{{$items->status}}</p>
                        @else
                            <p class="bg-danger text-white text-center">{{$items->status}}</p>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>
                
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('rooms.detail', ['id'=>$items->id])}}">Detail</a>
                            <a class="dropdown-item" href="{{route('rooms.edit',['id'=>$items->id])}}">Edit</a>
                            <form action="{{route('rooms.destroy',['id'=>$items->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</button>
                            </form>
                            
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$listRoom->links()}}
        </div>
    </div>
</div>

@endsection