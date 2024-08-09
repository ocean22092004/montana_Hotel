@extends('admin.default')
@section('title')
    banners
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Banners</h2>
          <a href="{{route('banners.create')}}" class="btn mdi">Add banner</a>
        </div>
        <div class="card-body">
          
    
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listBanner as $items)
                    
                
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->link}}</td>
                    <td>
                        @if(!isset($items->image_path))
                            Không có hình ảnh
                        @else
                            <img src="{{Storage::url($items->image_path)}}" style="width:200px">
                        @endif
                    </td>
                    <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('banners.edit',['id'=>$items->id])}}">Edit</a>
                        <form action="{{route('banners.destroy',['id'=>$items->id])}}" method="POST">
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
        {{$listBanner->links()}}
        </div>
    </div>
</div>

@endsection