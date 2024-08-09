@extends('users.default')

@section('content')
    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg_1">
        <h3>Laxaries Rooms</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- offers_area_start -->
    {{-- <div class="offers_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Our Offers</span>
                        <h3>Ongoing Offers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="{{ asset('assets/img/offers/1.png')}}" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br> 
                                rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="{{ asset('assets/img/offers/2.png')}}" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br> 
                                rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="{{ asset('assets/img/offers/3.png')}}" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br> 
                                rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- offers_area_end -->

    <!-- features_room_startt -->
    <div class="features_room">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Featured Rooms</span>
                        <h3>Choose a Better Room</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_here">
            @foreach ($listRoomType as $item)
                @php
                    $availableRooms = $listRoom
                        ->where('room_type_id', $item->id)
                        ->count();
                    $pricePerHour = $listRoom
                        ->where('room_type_id', $item->id)
                        ->min('price_per_hour');
                    $pricePerNight = $listRoom
                        ->where('room_type_id', $item->id)
                        ->min('price_per_night');
                    $pricePerDay = $listRoom
                        ->where('room_type_id', $item->id)
                        ->min('price_per_day');
                @endphp
                {{-- <a href="/boocking"> --}}
                    <div class="single_rooms">
                        <div class="room_thumb">
                            <img src="{{Storage::url($item->image)}}" alt="">
                            <div class="room_heading d-flex justify-content-between align-items-center">
                                <div class="room_heading_inner">
                                    {{-- <span>From ${{ number_format($pricePerNight, 2) }}/night</span> --}}
                                    @if ($availableRooms > 0)
                                        <span>{{ $availableRooms }} rooms available</span>
                                        <span>From {{ number_format($pricePerHour) }} VND for an hour</span>
                                        <span>From {{ number_format($pricePerNight) }} VND for a night</span>
                                        <span>From {{ number_format($pricePerDay) }} VND for a day</span>
                                        <h3>{{ $item->name }}</h3>
                                        <a href="{{route('detail', ['id'=>$item->id])}}" class="line-button">detail</a>
                                        <a href="{{route('booking', ['id'=>$item->id])}}" class="line-button">book now</a>
                                    @else
                                        <span>No more rooms available</span>
                                        <h3>{{ $item->name }}</h3>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            @endforeach
            {{-- <div class="single_rooms">
                <div class="room_thumb">
                    <img src="{{ asset('assets/img/rooms/2.png')}}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Deluxe Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div>
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="{{ asset('assets/img/rooms/3.png')}}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Signature Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div>
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="{{ asset('assets/img/rooms/4.png')}}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From $250/night</span>
                            <h3>Couple Room</h3>
                        </div>
                        <a href="#" class="line-button">book now</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- features_room_end -->

    <!-- forQuery_start -->
    <div class="forQuery">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-md-12">
                    <div class="Query_border">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="Query_text">
                                        <p>For Reservation 0r Query?</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="phone_num">
                                        <a href="#" class="mobile_no">+10 576 377 4789</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- forQuery_end-->

    <!-- instragram_area_start -->
    <div class="instragram_area">
        <div class="single_instagram">
            <img src="{{ asset('assets/img/instragram/1.png')}}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('assets/img/instragram/2.png')}}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('assets/img/instragram/3.png')}}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('assets/img/instragram/4.png')}}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('assets/img/instragram/5.png')}}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- instragram_area_end -->
@endsection