<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objSchedule = new Schedule();
        $this->view['listSchedule'] = $objSchedule->loadListSchedule();
        // dd($data);
        return view('admin.schedule.index', $this->view);
    }

    public function create()
    {
        $objRoomType = new Room();
        $this->view['listRoom'] = $objRoomType->loadAllRoom();
        return view('admin.schedule.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $objSchedule = new Schedule();
        // dd($data);
        $res = $objSchedule->insertDataSchedule($data);
        if ($res) {
            return redirect()->back()->with('success', "Thêm lịch trình thành công");
        } else {
            return redirect()->back()->with('error', "Thêm lịch trình không thành công");
        }
    }

    public function edit(int $id)
    {
        $objSchedule = new Schedule();
        $this->view['schedule'] = $objSchedule->loadScheduleById($id);
        $objRoom = new Room();
        $this->view['listRoom'] = $objRoom->loadAllRoom();
        return view('admin.schedule.edit', $this->view);
    }

    public function update(Request $request, int $id)
    {
        // $data = $request->all();
        $objSchedule = new Schedule();
        $idCheck = $objSchedule->loadScheduleById($id);
        if ($idCheck) {
            $data = $request->all();
            $res = $objSchedule->updateDataSchedule($data, $id);
            if ($res) {
                return redirect()->back()->with('success', "Sửa lịch trình thành công");
            } else {
                return redirect()->back()->with('error', "Sửa lịch trình không thành công");
            }
        }else{
            return redirect()->back()->with('error', "Không tìm thấy id");
        }
        // dd($data); 
    }

    public function destroy(int $id)
    {
        $objSchedule = new Schedule();
        $idCheck = $objSchedule->loadScheduleById($id);

        if ($idCheck) {
            $schedule = $objSchedule->find($id);
            // $amenity->products()->delete(); // Xóa các bản ghi liên quan trong bảng products
            $res = $schedule->delete();

            if ($res) {
                return redirect()->back()->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('error', 'Xóa thất bại');
            }
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy ID');
        }
    }
}
