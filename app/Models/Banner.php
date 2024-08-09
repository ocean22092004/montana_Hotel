<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image_path',
        'link',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;


    public function loadAllBanner()
    {
        $query = Banner::query()->get();
        return $query;
    }

    public function loadListBanner()
    {
        $query = Banner::query()
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertDataBanner($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Banner::query()->create($params);
        return $res;
    }

    public function loadIdBanner($id)
    {
        $query = Banner::query()
            ->find($id);
        return $query;
    }

    public function updateDataBanner($params, $id)
    {
        $res = Banner::query()->find($id)
            ->update($params);
        return $res;
    }

    public function deleteDataBanner($id)
    {
        $res = Banner::query()->find($id)
            ->delete();
        return $res;
    }
}
