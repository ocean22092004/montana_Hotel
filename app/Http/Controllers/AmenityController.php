<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmenityRequest;
use App\Models\Amenity;
use App\Models\RoomType;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objAmenity = new Amenity();
        $this->view['listAmenity'] = $objAmenity->loadListAmenity();
        return view('admin.amenity.index', $this->view);
    }

    public function create()
    {
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadAllRoomType();
        return view('admin.amenity.create', $this->view);
    }

    public function store(AmenityRequest $request)
    {
        $data = $request->all();
        $objAmenity = new Amenity();
        // dd($data);
        $res = $objAmenity->insertDataAmenity($data);
        if ($res) {
            return redirect()->back()->with('success', "Thêm tiện ích thành công");
        } else {
            return redirect()->back()->with('error', "Thêm tiện ích không thành công");
        }
    }

    public function edit(int $id)
    {
        $objAmenity = new Amenity();
        $this->view['amenity'] = $objAmenity->loadAmenityById($id);
        $objRoomType = new RoomType();
        $this->view['listRoomType'] = $objRoomType->loadAllRoomType();
        return view('admin.amenity.edit', $this->view);
    }

    public function update(AmenityRequest $request, int $id)
    {
        // $data = $request->all();
        $objAmenity = new Amenity();
        $idCheck = $objAmenity->loadAmenityById($id);
        if ($idCheck) {
            $data = $request->all();
            $res = $objAmenity->updateDataAmenity($data, $id);
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
        $objAmenity = new Amenity();
        $idCheck = $objAmenity->loadAmenityById($id);

        if ($idCheck) {
            $amenity = $objAmenity->find($id);
            // $amenity->products()->delete(); // Xóa các bản ghi liên quan trong bảng products
            $res = $amenity->delete();

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
