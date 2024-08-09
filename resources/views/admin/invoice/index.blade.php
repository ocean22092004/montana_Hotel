@extends('admin.default')
@section('title')
    invoices
@endsection
@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header">
          <h2>Invoices</h2>
          {{-- <a href="{{route('room_types.create')}}" class="btn mdi">Add room type</a> --}}
        </div>
        <div class="card-body">
          
    
        <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Booking id</th>
                <th>Room</th>
                <th>Check in</th>
                <th>Check out</th>
                <th>Invoice date</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($listInvoice as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->booking_id}}</td>
                    <td>{{$items->loadAllBooking->room_id}}</td>
                    <td>{{$items->loadAllBooking->check_in_date}}</td>
                    <td>{{$items->loadAllBooking->check_out_date}}</td>
                    <td>{{$items->invoice_date}}</td>
                    <td>{{$items->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$listInvoice->links()}}
        </div>
    </div>
</div>

@endsection