<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'start',
        'end',
        'room_id',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function loadAllSchedule()
    {
        $query = Schedule::query()->get();
        return $query;
    }

    public function loadScheduleByRoomId($id)
    {
        $query = Schedule::query()
            ->where('room_id', $id)->get();
        return $query;
    }

    public function loadListSchedule()
    {
        $query = Schedule::query()
            ->with('rooms')
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertDataSchedule($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Schedule::query()->create($params);
        return $res;
    }

    public function loadScheduleById($id)
    {
        $query = Schedule::query()
            ->find($id);
        return $query;
    }

    public function updateDataSchedule($params, $id)
    {
        $res = Schedule::query()->find($id)
            ->update($params);
        return $res;
    }

    public function deleteDataSchedule($id)
    {
        $res = Schedule::query()->find($id)
            ->delete();
        return $res;
    }

    //---

    public function insertScheduleWhenBooking($room_id, $start, $end)
    {
        $params['room_id'] = $room_id;
        $params['start'] = $start;
        $params['end'] = $end;
        $params['name'] = 'Booking';
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Schedule::query()->create($params);
        return $res;
    }
}
