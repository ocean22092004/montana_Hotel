<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $objBooking = new Booking();
        $objRoom = new Room();
        $objSchedule = new Schedule();

        $objRoom->updateStatusRoom($data['room_id']);
        $res = $objBooking->insertDataBooking($data);
        if ($res) {
            $objSchedule->insertScheduleWhenBooking($data['room_id'], $data['check_in_date'], $data['check_out_date']);
            return redirect()->route('offlinePayment')->with('success', "Đặt phòng thành công, hãy đến nhận phòng đúng giờ nhé");
        } else {
            return redirect()->back()->with('error', "Đặt phòng thất bại");
        }
        // return redirect()->route('offlinePayment');


        // Default fallback if necessary
        return redirect()->back()->with('error', 'Invalid payment method selected.');
    }

    public function offlinePayment()
    {
        return view('users.success_pay');
    }

    public function vnpay(Request $request)
    {
        $data = $request->all();

        // Lưu dữ liệu vào cookie
        $cookie = cookie('vnpay_data', json_encode($data), 10); // Cookie sẽ tồn tại trong 10 phút
        // Tạo URL chuyển hướng
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpayReturn');
        $vnp_TmnCode = "LNQQTTF6"; // Mã website tại VNPAY 
        $vnp_HashSecret = "YYURMUV0F5RZKWO8H9E8DSPP1Y4XFHIF"; // Chuỗi bí mật

        $vnp_TxnRef = 'HD'.$data['total_price']; // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "thanh toán hóa đơn";
        $vnp_OrderType = "Booking";
        $vnp_Amount = $data['total_price'] * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            return redirect($vnp_Url)->withCookie($cookie); // Chuyển hướng và gửi cookie cùng với phản hồi
        } else {
            return response()->json($returnData)->withCookie($cookie);
        }
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_SecureHash = $request->get('vnp_SecureHash');
        $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');

        // Lấy lại dữ liệu từ cookie
        $data = json_decode(Cookie::get('vnpay_data'), true);
        // dd($data['room_id']); // Hiển thị dữ liệu để kiểm tra

        ksort($inputData);
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');

        $vnp_HashSecret = "YYURMUV0F5RZKWO8H9E8DSPP1Y4XFHIF";
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            if ($request->get('vnp_ResponseCode') == '00') {
                $objBooking = new Booking();
                $objRoom = new Room();
                $objInvoice = new Invoice();
                $objSchedule = new Schedule();

                $objRoom->updateStatusRoom($data['room_id']);
                $res = $objBooking->insertDataBookingPaid($data);
                $idCheck = $objBooking->loadNewBooking();
                // dd($idCheck->check_in_date);
                $objSchedule->insertScheduleWhenBooking($idCheck->room_id, $idCheck->check_in_date, $idCheck->check_out_date);
                // dd($newBooking->total_price);
                $objInvoice->insertInvoiceWhenPay($idCheck->id, $idCheck->total_price);
                $mail = Mail::to(Auth::user()->email)->send(new InvoiceMail($idCheck));
                Cookie::forget('vnpay_data');
                if ($res) {
                    return redirect()->route('offlinePayment')->with('success', "Đặt phòng thành công, hãy đến nhận phòng đúng giờ nhé");
                } else {
                    return redirect()->back()->with('error', "Đặt phòng thất bại");
                }
            } else {
                return redirect()->route('rooms')->with('error', 'Thanh toán thất bại!');
            }
        } else {
            return redirect()->route('rooms')->with('error', 'Dữ liệu không hợp lệ!');
        }
    }
}
