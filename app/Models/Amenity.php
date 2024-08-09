<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name', 
        'icon', 
        'created_at', 
        'updated_at', 
        'room_type_id',
    ];
    public $timestamps = false;

    public function loadAllRoomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function loadAllAmenity(){
        $query = Amenity::query()->get();
        return $query;
    }

    public function loadAmenityByRTypeId($id)
    {
        $query = Amenity::query()
            ->where('room_type_id', $id)->get();
        return $query;
    }

    public function loadListAmenity(){
        $query = Amenity::query()
            ->with('loadAllRoomType')
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertDataAmenity($params){
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Amenity::query()->create($params);
        return $res;
    }

    public function loadAmenityById($id){
        $query = Amenity::query()
            ->find($id);
        return $query;
    }

    public function updateDataAmenity($params, $id)
    {
        $res = Amenity::query()->find($id)
            ->update($params);
        return $res;
    }

    public function deleteDataAmenity($id){
        $res = Amenity::query()->find($id)
            ->delete();
        return $res;
    }
}
