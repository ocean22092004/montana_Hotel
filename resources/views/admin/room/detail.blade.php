@extends('admin.default')
@section('title')
    rooms
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="px-6 py-4">
          <h2>Detail Room {{$roomId->id}}</h2>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xl-6">
          <!-- Basic Table-->
          <div class="card card-default">
            <div class="card-header">
              <h2>Basic Table</h2>
      
              <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-table-1" role="button"
                aria-expanded="false" aria-controls="collapse-table-1"> </a>
      
      
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Bed Count</th>
                    <th scope="col">Max occ</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">{{$roomTypeById->name}}</td>
                    <td>{{$roomId->bed_count}}</td>
                    <td>{{$roomId->max_occupancy}}</td>
                    <td>
                        @if ($roomId->status == 'available')
                            <p class="bg-success text-white text-center">{{$roomId->status}}</p>
                        @elseif ($roomId->status == 'booked')
                            <p class="bg-warning text-dark text-center">{{$roomId->status}}</p>
                        @elseif ($roomId->status == 'occupied')
                            <p class="bg-secondary text-white text-center">{{$roomId->status}}</p>
                        @elseif ($roomId->status == 'housekeeping')
                            <p class="bg-info text-white text-center">{{$roomId->status}}</p>
                        @else
                            <p class="bg-danger text-white text-center">{{$roomId->status}}</p>
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      
          <!-- Bordered Table -->
          <div class="card card-default">
            <div class="card-header">
              <h2>Schedule</h2>
      
              <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-table-bordered" role="button"
                aria-expanded="false" aria-controls="collapse-table-bordered"> </a>
      
      
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($listSchedule as $item)
                    <tr>
                        <td scope="row">{{$item->name}}</td>
                        <td>{{$item->start}}</td>
                        <td>{{$item->end}}</td>
                        <th class="text-center">
                          <a href="#">
                            <i class="mdi mdi-open-in-new"></i>
                          </a>
                          <a href="#">
                            <i class="mdi mdi-close text-danger"></i>
                          </a>
          
                        </th>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <!-- Striped Table -->
          <div class="card card-default">
            <div class="card-header">
              <h2>Price</h2>
      
              <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-table-striped" role="button"
                aria-expanded="false" aria-controls="collapse-table-striped"> </a>
      
      
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Per Hour</th>
                    <th scope="col">Per Night</th>
                    <th scope="col">Per Day</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">{{number_format($roomId->price_per_hour, 0, ',', '.')}}</td>
                    <td>{{number_format($roomId->price_per_night, 0, ',', '.')}}</td>
                    <td>{{number_format($roomId->price_per_day, 0, ',', '.')}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      
          
          <div class="card card-default">
            <div class="card-header">
              <h2>Amenities</h2>
      
              <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-table-contextual" role="button"
                aria-expanded="false" aria-controls="collapse-table-contextual"> </a>
      
      
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- {{$listRoomType->name}} --}}
                    @foreach ($listAmenity as $item)
                        <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->icon}}</td>
                            <th class="text-center">
                                <a href="#">
                                  <i class="mdi mdi-open-in-new"></i>
                                </a>
                                <a href="#">
                                  <i class="mdi mdi-close text-danger"></i>
                                </a>
                
                            </th>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      
      </div>
    
</div>

@endsection