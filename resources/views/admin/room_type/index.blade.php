@extends('admin.default')
@section('title')
    room types
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Room Types</h2>
          <a href="{{route('room_types.create')}}" class="btn mdi">Add room type</a>
        </div>
        <div class="card-body">
          
    
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listRoomType as $items)
                    
                
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->name}}</td>
                    <td>
                        @if(!isset($items->image))
                            Không có hình ảnh
                        @else
                            <img src="{{Storage::url($items->image)}}" style="width:200px">
                        @endif
                    </td>
                    
                    <td>{{$items->description}}</td>
                    <td>{{$items->status}}</td>
                    <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('room_types.edit',['id'=>$items->id])}}">Edit</a>
                        <form action="{{route('room_types.destroy',['id'=>$items->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</button>
                        </form>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$listRoomType->links()}}
        </div>
    </div>
</div>

@endsection