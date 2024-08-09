@extends('admin.default')
@section('title')
    amenities
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Amenities</h2>
          <a href="{{route('amenities.create')}}" class="btn mdi">Add Amenity</a>
        </div>
        <div class="card-body">
          
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Icon</th>
                <th>Room Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listAmenity as $items)
                    
                
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->icon}}</td>
                    <td>{{$items->loadAllRoomType->name}}</td>
                    <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('amenities.edit',['id'=>$items->id])}}">Edit</a>
                        <form action="{{route('amenities.destroy',['id'=>$items->id])}}" method="POST">
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
        {{$listAmenity->links()}}
        </div>
    </div>
</div>

@endsection