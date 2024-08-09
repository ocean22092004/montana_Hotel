<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    // config tắt id tự động tăng
    public $incrementing = false;

    // kiểu dữ liệu của khóa chính
    protected $keyType = "integer";

    protected $fillable = [
        'id',
        'room_type_id',
        'bed_count',
        'max_occupancy',
        'price_per_night',
        'price_per_hour',
        'price_per_day',
        'status',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function loadAllRoomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function loadAllSchedule(){
        return $this->hasMany(Schedule::class, 'room_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'room_id');
    }

    public function loadAllRoom(){
        $query = Room::query()->get();
        return $query;
    }

    public function loadListRoom(){
        $query = Room::query()
            ->with('loadAllRoomType')
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function loadIdRoom($id){
        $query = Room::query()->find($id);
        return $query;
    }

    public function insertDataRoom($params){
        // if($roomTypeId == )
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Room::query()->create($params);
        return $res;
    }

    public function updateDataRoom($params, $id)
    {
        $res = Room::query()->find($id)
            ->update($params);
        return $res;
    }

    public function deleteDataRoom($id){
        $res = Room::query()->find($id)
            ->delete();
        return $res;
    }

    public function loadAvailableRoom(){
        return Room::where('status', 'available')->get();
    }

    public function loadAvailableRoomByRoomTypeId($id){
        return Room::where('status', 'available')
                    ->where('room_type_id', $id)
                    ->first();
    }
    
    public function updateStatusRoom($id){
        $res = Room::query()->find($id);
        $res->status = 'booked';
        $res->save();
        return $res;
    }

    public function resetStatusRoom($id){
        $res = Room::query()->find($id);
        $res->status = 'available';
        $res->save();
        return $res;
    }
}
