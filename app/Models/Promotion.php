<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'discount',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;


    public function loadAllPromotion()
    {
        $query = Promotion::query()->get();
        return $query;
    }

    public function loadListPromotion()
    {
        $query = Promotion::query()
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertDataPromotion($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Promotion::query()->create($params);
        return $res;
    }

    public function loadIdPromotion($id)
    {
        $query = Promotion::query()
            ->find($id);
        return $query;
    }

    public function updateDataPromotion($params, $id)
    {
        $res = Promotion::query()->find($id)
            ->update($params);
        return $res;
    }

    public function deleteDataPromotion($id)
    {
        $res = Promotion::query()->find($id)
            ->delete();
        return $res;
    }
}
