<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = "room_types";
    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function Rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }

    public function Amenities(){
        return $this->hasMany(Amenity::class, 'room_type_id');
    }
    public function loadAllRoomType()
    {
        $query = RoomType::query()->get();
        return $query;
    }

    public function loadListRoomType()
    {
        $query = RoomType::query()
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertDataRoomType($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = RoomType::query()->create($params);
        return $res;
    }

    public function loadIdRoomType($id)
    {
        $query = RoomType::query()
            ->find($id);
        return $query;
    }

    public function updateDataRoomType($params, $id)
    {
        $res = RoomType::query()->find($id)
            ->update($params);
        return $res;
    }

    public function deleteDataRoomType($id){
        $res = RoomType::query()->find($id)
            ->delete();
        return $res;
    }

    //-- user

    public function loadRoomTypePublic(){
        $query = RoomType::query()
            ->where('status', 1)->get();
        return $query;

    }

    public function roomTypeData($id)
    {
        $roomTypeData = [];
        
        $rooms = Room::where('room_type_id', $id)
            ->select('price_per_hour', 'price_per_night', 'price_per_day')
            ->get();

        $availableRooms = Room::where('room_type_id', $id)
            ->count();

        $roomTypeData = [
            'available_rooms' => $availableRooms,
            'price_per_hour' => $rooms->min('price_per_hour'),
            'price_per_night' => $rooms->min('price_per_night'),
            'price_per_day' => $rooms->min('price_per_day')
        ];

        return $roomTypeData;
    }
}
