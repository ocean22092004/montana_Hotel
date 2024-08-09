<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadListRoomType();
        return view('admin.room_type.index', $this->view);
    }

    public function create()
    {
        return view('admin.room_type.create', $this->view);
    }

    private function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('image_room_type', $fileName, 'public');
    }

    public function store(StoreRoomTypeRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->uploadFile($request->file('image'));
        }
        $objRoomType = new RoomType();
        // dd($data);
        $res = $objRoomType->insertDataRoomType($data);
        if ($res) {
            return redirect()->back()->with('success', "Sản phẩm thêm thành công");
        } else {
            return redirect()->back()->with('error', "Sản phẩm không thêm thành công");
        }
    }

    public function edit(int $id)
    {
        $objRoomType = new RoomType();
        $this->view['idRoomType'] = $objRoomType->loadIdRoomType($id);
        // dd($objRoomType);
        return view('admin.room_type.edit', $this->view);
    }

    public function update(UpdateRoomTypeRequest $request, int $id)
    {
        $objRoomType = new RoomType();
        $idCheck = $objRoomType->loadIdRoomType($id);
        if ($idCheck) {
            $data = $request->except('image');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $this->uploadFile($request->file('image'));
                $imageOld = $idCheck->image;
            } else {
                $data['image'] = $idCheck->image;
            }
            $res = $objRoomType->updateDataRoomType($data, $id);
            if ($res) {
                if ($request->hasFile('image') && Storage::disk('public')->exists($idCheck->image)) {
                    Storage::disk('public')->delete($imageOld);
                }
                return redirect()->back()->with('success', 'Chỉnh sửa thành công');
            } else {
                return redirect()->back()->with('error', 'Chỉnh sửa không thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy id');
        }
    }

    public function destroy(int $id)
    {
        $objRoomType = new RoomType();
        $idCheck = $objRoomType->loadIdRoomType($id);
        $imageOld = $idCheck->image;
        if ($idCheck) {
            $res = $objRoomType->deleteDataRoomType($id);
            if ($res) {
                if (Storage::disk('public')->exists($imageOld)) {
                    Storage::disk('public')->delete($imageOld);
                }
                return redirect()->back()->with('success', 'xóa thông tin thành công');
            } else {
                return redirect()->back()->with('error', 'xóa thông tin không thành công');
            }
        } else {
            return redirect()->back()->with('error', 'không tìm thấy id');
        }
    }

    //-- user

    public function roomTypes()
    {
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadRoomTypePublic();

        $objRoom = new Room();
        $this->view['listRoom'] = $objRoom->loadAvailableRoom();
        // dd($data);
        return view('users.room', $this->view);
    }
}
