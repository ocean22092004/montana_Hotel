@extends('users.default')

@section('content')
<div class="bradcam_area breadcam_bg_1">
    <h3>Laxaries Rooms</h3>
</div>
<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="about_info">
                    <div class="section_title mb-20px">
                        <span>About</span>
                        <h3>{{$roomTypeById->name}}</h3>
                    </div>
                    <p>{{$roomTypeById->description}}</p>
                    <h4>{{$roomTypeData['available_rooms'] }} rooms available</h4>
                </div>
                <div class="row">
                    <div class="col">
                        <p>For {{$roomTypeData['price_per_hour'] }} VNĐ per hour</p>
                        <p>For {{$roomTypeData['price_per_night'] }} VNĐ per night</p>
                        <p>For {{$roomTypeData['price_per_day']}} VNĐ per day</p>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('booking', ['id'=>$roomTypeById->id])}}" class="btn btn-dark mt-5 mb-5">Book now</a>
                    </div>
                </div>
                <h4 data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer">Amenities</h4>
                    
                    <div class="card">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                             @foreach ($amenityByIdRoomType as $item)
                                <p>{{$item->name}}</p>
                             @endforeach
                          </div>
                        </div>
                    </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about_thumb d-flex">
                    <div class="img_1">
                        <img src="{{Storage::url($roomTypeById->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
