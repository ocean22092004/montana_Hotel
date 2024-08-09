<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objPromotion = new Promotion();
        $this->view['listPromotion'] = $objPromotion->loadListPromotion();
        return view('admin.Promotion.index', $this->view);
    }

    public function create()
    {
        return view('admin.Promotion.create', $this->view);
    }

    public function store(PromotionRequest $request)
    {
        $data = $request->all();
        $objPromotion = new Promotion();
        // dd($data);
        $res = $objPromotion->insertDataPromotion($data);
        if ($res) {
            return redirect()->back()->with('success', "Thêm Promotion thành công");
        } else {
            return redirect()->back()->with('error', "Thêm không thành công");
        }
    }

    public function edit(int $id)
    {
        $objPromotion = new Promotion();
        $this->view['idPromotion'] = $objPromotion->loadIdPromotion($id);
        // dd($objPromotion);
        return view('admin.Promotion.edit', $this->view);
    }

    public function update(PromotionRequest $request, int $id)
    {
        $objPromotion = new Promotion();
        $idCheck = $objPromotion->loadIdPromotion($id);
        if ($idCheck) {
            $data = $request->all();
            $res = $objPromotion->updateDataPromotion($data, $id);
            if ($res) {
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
        $objPromotion = new Promotion();
        $idCheck = $objPromotion->loadIdPromotion($id);
        if ($idCheck) {
            $res = $objPromotion->deleteDataPromotion($id);
            if ($res) {
                return redirect()->back()->with('success', 'xóa thông tin thành công');
            } else {
                return redirect()->back()->with('error', 'xóa thông tin không thành công');
            }
        } else {
            return redirect()->back()->with('error', 'không tìm thấy id');
        }
    }
}
