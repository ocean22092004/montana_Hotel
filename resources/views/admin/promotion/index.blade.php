@extends('admin.default')
@section('title')
    promotions
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Promotions</h2>
          <a href="{{route('promotions.create')}}" class="btn mdi">Add Promotion</a>
        </div>
        <div class="card-body">
          
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Discount</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listPromotion as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->title}}</td>
                    <td>{{$items->description}}</td>
                    <td>{{$items->discount}}</td>
                    <td>{{$items->start_date}}</td>
                    <td>{{$items->end_date}}</td>
                    <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('promotions.edit',['id'=>$items->id])}}">Edit</a>
                        <form action="{{route('promotions.destroy',['id'=>$items->id])}}" method="POST">
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
        {{$listPromotion->links()}}
        </div>
    </div>
</div>

@endsection