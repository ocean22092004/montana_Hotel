@extends('admin.default')
@section('title')
    schedules
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Schedules</h2>
          <a href="{{route('schedules.create')}}" class="btn mdi">Add Schedule</a>
        </div>
        <div class="card-body">
          
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Room</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listSchedule as $items)
                    
                
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->start}}</td>
                    <td>{{$items->end}}</td>
                    <td>{{$items->rooms->id}}</td>
                    <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('schedules.edit',['id'=>$items->id])}}">Edit</a>
                        <form action="{{route('schedules.destroy',['id'=>$items->id])}}" method="POST">
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
        {{$listSchedule->links()}}
        </div>
    </div>
</div>

@endsection