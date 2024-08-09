<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Banner;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $view;
    public function __construct()
    {
        $this->middleware('auth');
        $this->view = [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $objBanner = new Banner();
        $this->view['listBanner'] = $objBanner->loadAllBanner();

        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadRoomTypePublic();

        $objRoom = new Room();
        $this->view['listRoom'] = $objRoom->loadAvailableRoom();
        // dd($data);
        // return view('users.room', $this->view);
        return view('users.index', $this->view);
    }

    public function roomTypes()
    {
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadRoomTypePublic();

        $objRoom = new Room();
        $this->view['listRoom'] = $objRoom->loadAvailableRoom();
        // dd($data);
        return view('users.room', $this->view);
    }

    public function detailRoom(int $id)
    {
        $dataRoomType = new RoomType();
        $this->view['roomTypeData'] = $dataRoomType->roomTypeData($id);

        $objRoomType = new RoomType();
        $this->view['roomTypeById'] = $objRoomType->loadIdRoomType($id);

        $dataAmenity = new Amenity();
        $this->view['amenityByIdRoomType'] = $dataAmenity->loadAmenityByRTypeId($id);
        // dd($data);
        return view('users.detail_room', $this->view);
    }

    public function booking(int $id)
    {
        // $time = date('Y-m-d H:i:s');
        $time = Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(30)->format('Y-m-d\TH:i:s');
        $this->view['time'] = $time;
        // {{ date('Y-m-d h:i:s A', strtotime($time)) }}
        $dataRoomType = new RoomType();
        $this->view['roomTypeData'] = $dataRoomType->roomTypeData($id);

        $objRoomType = new RoomType();
        $this->view['roomTypeById'] = $objRoomType->loadIdRoomType($id);

        $objRoom = new Room();
        $this->view['roomAv'] = $objRoom->loadAvailableRoomByRoomTypeId($id);
        // dd($data);
        return view('users.booking', $this->view);
    }

    public function detailBooking()
    {
        $id = Auth::user()->id;
        $objBooking = new Booking();
        $this->view['listBooking'] = $objBooking->loadBookingByUser($id);
        // dd($data);
        return view('users.detailBooking', $this->view);
    }
}
