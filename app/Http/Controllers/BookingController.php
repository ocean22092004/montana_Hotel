<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Mail\InvoiceMail;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view;
    }

    public function index()
    {
        $objBooking = new Booking();
        $this->view['listBooking'] = $objBooking->loadListBooking();
        return view('admin.booking.index', $this->view);
    }

    public function edit(int $id)
    {
        $objBooking = new Booking();
        $booking = $objBooking->loadBookingById($id);
        $this->view['booking'] = $booking;
        // dd();
        $objUser = new User();
        $this->view['user'] = $objUser->loadUserById($booking->user_id);

        return view('admin.booking.edit', $this->view);
    }

    public function update(Request $request, int $id)
    {
        // $data = $request->all();
        $objBooking = new Booking();
        $objInvoice = new Invoice();
        $objRoom = new Room();
        $objSchedule = new Schedule();

        $idCheck = $objBooking->loadBookingById($id);
        if ($idCheck) {
            $data = $request->all();
            // dd($data);
            // dd($idCheck->status);
            if ($idCheck->status == 'Done' && $data['status'] == 'Paid') {
                return redirect()->back()->withErrors(['error' => 'Cannot update status from ' . $data['status'] . ' to ' . $idCheck->status]);
            } elseif ($idCheck->status == 'Done' && $data['status'] == 'Room received') {
                return redirect()->back()->withErrors(['error' => 'Cannot update status from ' . $data['status'] . ' to ' . $idCheck->status]);
            } elseif ($idCheck->status == 'Done' && $data['status'] == 'Waiting for room') {
                return redirect()->back()->withErrors(['error' => 'Cannot update status from ' . $data['status'] . ' to ' . $idCheck->status]);
            } elseif ($idCheck->status == 'Paid' && $data['status'] == 'Room received') {
                return redirect()->back()->withErrors(['error' => 'Cannot update status from ' . $data['status'] . ' to ' . $idCheck->status]);
            } elseif ($idCheck->status == 'Paid' && $data['status'] == 'Waiting for room') {
                return redirect()->back()->withErrors(['error' => 'Cannot update status from ' . $data['status'] . ' to ' . $idCheck->status]);
            } elseif ($data['status'] == 'Paid') {
                // dd(Auth::user()->email);
                $objInvoice->insertInvoiceWhenPay($idCheck->id, $data['total_price']);
                $res = $objBooking->updateDataBooking($data, $id);
                if ($res) {
                    $mail = Mail::to(Auth::user()->email)->send(new InvoiceMail($idCheck));
                    return redirect()->back()->with('success', "Trạng thái thành công");
                } else {
                    return redirect()->back()->with('error', "Sửa trạng thái thất bại");
                }
            } elseif ($data['status'] == 'Done') {
                // $objInvoice->insertInvoiceWhenPay($data['id'], $data['total_price']);
                $schedule = $objSchedule->where('name', 'Booking')->where('room_id', $idCheck->room_id)->first();
                $schedule->delete();

                $objBooking->updateDataBooking($data, $id);
                $res = $objRoom->resetStatusRoom($idCheck->room_id);
                if ($res) {
                    return redirect()->back()->with('success', "Trạng thái thành công");
                } else {
                    return redirect()->back()->with('error', "Sửa trạng thái thất bại");
                }
            } else {
                $res = $objBooking->updateDataBooking($data, $id);
                if ($res) {
                    return redirect()->back()->with('success', "Trạng thái thành công");
                } else {
                    return redirect()->back()->with('error', "Sửa trạng thái thất bại");
                }
            }
        } else {
            return redirect()->back()->with('error', "Không tìm thấy id");
        }
        // dd($data); 
    }
}
