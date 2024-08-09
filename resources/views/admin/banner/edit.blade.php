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
          <h2>Add banner</h2>
          <a href="{{route('banners.index')}}" class="btn mdi">Back to list</a>
        </div>
        <div class="card-body">
            <form action="{{route('banners.update', ['id'=>$idBanner->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleFormControlInput1">Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="link" value="{{$idBanner->link}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" class="form-control-file" name="image_path">
                </div>
                <img src="{{Storage::url($idBanner->image_path)}}" alt="" style="width: 100px">
                <div class="form-footer mt-6">
                  <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                  {{-- <button type="submit" class="btn btn-light btn-pill">Cancel</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@endsection