<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Schedule;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objRoom = new Room();
        $this->view['listRoom'] = $objRoom->loadListRoom();
        return view('admin.room.index', $this->view);
    }

    public function detail($id)
    {
        $dataIdRoomType = new Room();
        $dt = $dataIdRoomType->loadIdRoom($id);
        $idRoomType = $dt->room_type_id;
        $objRoomType = new RoomType();
        $this->view['roomTypeById'] = $objRoomType->loadIdRoomType($idRoomType);

        $objSchedule = new Schedule();
        $this->view['listSchedule'] = $objSchedule->loadScheduleByRoomId($id);
        $objAmenity = new Amenity();
        $this->view['listAmenity'] = $objAmenity->loadAmenityByRTypeId($idRoomType);
        // dd($data);
        $objRoom = new Room();
        $this->view['roomId'] = $objRoom->loadIdRoom($id);
        return view('admin.room.detail', $this->view);
    }

    public function create()
    {
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadAllRoomType();
        return view('admin.room.create', $this->view);
    }

    public function store(StoreRoomRequest $request)
    {
        $data = $request->all();
        $objRoom = new Room();
        // dd($data);
        $res = $objRoom->insertDataRoom($data);
        if ($res) {
            return redirect()->back()->with('success', "Thêm phòng thành công");
        } else {
            return redirect()->back()->with('error', "Thêm phòng không thành công");
        }
    }

    public function edit(int $id)
    {
        $objRoom = new Room();
        $this->view['room'] = $objRoom->loadIdRoom($id);
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadAllRoomType();
        return view('admin.room.edit', $this->view);
    }

    public function update(StoreRoomRequest $request, int $id)
    {
        // $data = $request->all();
        $objRoom = new Room();
        $idCheck = $objRoom->loadIdRoom($id);
        if ($idCheck) {
            $data = $request->all();
            $res = $objRoom->updateDataRoom($data, $id);
            if ($res) {
                return redirect()->back()->with('success', "Sửa tiện ích thành công");
            } else {
                return redirect()->back()->with('error', "Sửa tiện ích không thành công");
            }
        }else{
            return redirect()->back()->with('error', "Không tìm thấy id");
        }
        // dd($data); 
    }

    public function destroy(int $id)
    {
        $objRoom = new Room();
        $idCheck = $objRoom->loadIdRoom($id);

        if ($idCheck) {
            $room = $objRoom->find($id);
            // $room->products()->delete(); // Xóa các bản ghi liên quan trong bảng products
            $res = $room->delete();

            if ($res) {
                return redirect()->back()->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('error', 'Xóa thất bại');
            }
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy ID');
        }
    }

    //--- user

    
}
