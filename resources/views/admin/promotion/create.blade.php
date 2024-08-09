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
          <h2>Add Promotion</h2>
          <a href="{{route('promotions.index')}}" class="btn mdi">Back to list</a>
        </div>
        <div class="card-body">
            <form action="{{route('promotions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Description</label>
                    <input type="text" class="form-control" placeholder="Description" name="description" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Discount</label>
                    <input type="number" class="form-control" placeholder="Discount" name="discount" value="{{old('discount')}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Start_date</label>
                    <input type="date" class="form-control" placeholder="Start_date" name="start_date" value="{{old('start_date')}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">End_date</label>
                    <input type="date" class="form-control" placeholder="End_date" name="end_date" value="{{old('end_date')}}">
                </div>
                <div class="form-footer mt-6">
                  <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                  {{-- <button type="submit" class="btn btn-light btn-pill">Cancel</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@endsection