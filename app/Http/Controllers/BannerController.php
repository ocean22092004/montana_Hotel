<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objBanner = new Banner();
        $this->view['listBanner'] = $objBanner->loadListBanner();
        return view('admin.banner.index', $this->view);
    }

    public function create()
    {
        return view('admin.banner.create', $this->view);
    }

    private function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('image_banner', $fileName, 'public');
    }

    public function store(BannerRequest $request)
    {
        $data = $request->except('image_path');
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $data['image_path'] = $this->uploadFile($request->file('image_path'));
        }
        $objBanner = new Banner();
        // dd($data);
        $res = $objBanner->insertDataBanner($data);
        if ($res) {
            return redirect()->back()->with('success', "Thêm banner thành công");
        } else {
            return redirect()->back()->with('error', "Thêm không thành công");
        }
    }

    public function edit(int $id)
    {
        $objBanner = new Banner();
        $this->view['idBanner'] = $objBanner->loadIdBanner($id);
        // dd($objBanner);
        return view('admin.banner.edit', $this->view);
    }

    public function update(Request $request, int $id)
    {
        $objBanner = new Banner();
        $idCheck = $objBanner->loadIdBanner($id);
        if ($idCheck) {
            $data = $request->except('image_path');
            if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
                $data['image_path'] = $this->uploadFile($request->file('image_path'));
                $imageOld = $idCheck->image_path;
            } else {
                $data['image_path'] = $idCheck->image_path;
            }
            $res = $objBanner->updateDataBanner($data, $id);
            if ($res) {
                if ($request->hasFile('image_path') && Storage::disk('public')->exists($idCheck->image_path)) {
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
        $objBanner = new Banner();
        $idCheck = $objBanner->loadIdBanner($id);
        $imageOld = $idCheck->image;
        if ($idCheck) {
            $res = $objBanner->deleteDataBanner($id);
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
}
