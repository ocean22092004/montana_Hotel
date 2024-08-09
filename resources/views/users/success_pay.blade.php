@extends('users.default')

@section('content')
    <div class="p-3 mb-2 bg-dark text-dark" style="height: 130px">header</div>
    <div class="d-flex justify-content-center align-content-center  mb-3 mt-3" style="height: 600px">
        <div>
            <h1>Đặt phòng thành công</h1>
            <i class="fas fa-check-circle"></i>
            <h4>Hãy đến nhận phòng đúng giờ nhé</h4>
            <a href="" class="btn btn-dark">Chi tiết đơn hàng</a>
            <a href="{{route('home')}}" class="btn btn-primary">Quay lại trang chủ</a>
        </div>
    </div>
@endsection
