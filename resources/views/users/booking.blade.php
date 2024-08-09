@extends('users.default')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/booking.css')}}">
@endsection

@section('content')
<div class="container">
    <div id='form-wrapper'>
        <form id="processPaymentForm" action="{{route('processPayment')}}" method="POST">
            @csrf
            <div id='header' class='text-center mb-3'>
                <h1>{{ $roomTypeById->name }}</h1>
            </div>

            <h5>Billing Info</h5>
            <hr>
            <input type="number" name="room_id" value="{{$roomAv->id}}" hidden>
            <div class='form-group mb-1'>
                <label class='mb-1' for='checkInDate'>Check-in date</label>
                <input class='form-control mb-1' name="check_in_date" id='checkInDate' type="datetime-local" step="1" value="{{ date('Y-m-d\TH:i:s', strtotime($time)) }}">
            </div>

            <div class='form-group mb-1'>
                <label class='mb-1' for='checkInDate'>Check-in date</label><br>
                <button class="btn btn-dark" id="hourlyBookButton">Book by hour</button>
                <button class="btn btn-dark" id="nightlyBookButton">Book by night</button>
                <button class="btn btn-dark" id="dailyBookButton">Book by day</button>
            </div>

            <div class='form-group mb-1'>
                <label class='mb-1' for='checkOutDate'>Check-out date</label>
                <input id='checkOutDate' name="check_out_date" class='form-control' type="datetime-local" step="1">
            </div>

            <div class='form-group mb-1'>
                <label class='mb-1' for='price'>Price</label>
                <input class='form-control' name="total_price" id='price' type="number" placeholder="price" readonly>
            </div>

            <div>
                <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-lock mr-2"></i>Submit Payment On Arrival</button>
            </div>
        </form>
        <form id="onlinePaymentForm" action="{{route('onlinePayment')}}" method="POST">
            @csrf
            <input type="number" name="room_id" hidden>
            <input type="datetime-local" step="1" name="check_in_date" hidden>
            <input type="datetime-local" step="1" name="check_out_date" hidden>
            <input type="number" name="total_price" hidden>

            <button type="submit" name="redirect" class="btn btn-primary mt-4"><i class="fas fa-lock mr-2"></i>Submit Payment Online</button>
        </form>
        @if($roomAv)
            <p>Room {{ $roomAv->id }} - Status: {{ $roomAv->status }}</p>
        @else
            <p>No available rooms</p>
        @endif
    </div>
</div>

<input type="hidden" id="hourlyPriceValue" value="{{ $roomTypeData['price_per_hour'] }}">
<input type="hidden" id="nightlyPriceValue" value="{{ $roomTypeData['price_per_night'] }}">
<input type="hidden" id="dailyPriceValue" value="{{ $roomTypeData['price_per_day'] }}">

<script src="{{ asset('assets/js/booking.js') }}"></script>
@endsection
