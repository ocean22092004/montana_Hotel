<h1>Hóa hóa đơn thanh toán thành công</h1>

<p>Cảm ơn {{Auth::user()->name}}</p>
<p>Phòng của bạn: {{$idCheck->room_id}}</p>
<p>Mã thanh toán: HD{{$idCheck->id}}</p>
<p>Ngày/Giờ nhận phòng: {{$idCheck->check_in_date}}</p>
<p>Ngày/Giờ trả phòng: {{$idCheck->check_out_date}}</p>
<p>Số tiền: {{$idCheck->total_price}}</p>
<p>Ngày thanh toán: {{date('d-m-Y')}}</p>

<p>Chú ý nhận phòng đúng giờ nhé</p>
