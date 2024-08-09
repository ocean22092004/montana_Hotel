<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
        'created_at',
        'updated_at',

    ];
    public $timestamps = false;

    public function loadAllRoom()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function loadAllUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function loadListBooking()
    {
        $query = Booking::query()
            ->with('loadAllRoom')
            ->with('loadAllUser')
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertDataBooking($params)
    {
        $params['user_id'] = Auth::user()->id;
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Booking::query()->create($params);
        return $res;
    }

    public function insertDataBookingPaid($params)
    {
        $params['status'] = 'Paid';
        $params['user_id'] = Auth::user()->id;
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Booking::query()->create($params);
        return $res;
    }

    public function loadBookingById($id)
    {
        $query = Booking::query()
            ->find($id);
        return $query;
    }

    public function updateDataBooking($params, $id)
    {
        $res = Booking::query()->find($id)
            ->update($params);
        return $res;
    }

    public function loadNewBooking()
    {
        $query = Booking::query()
            ->orderBy('created_at', 'desc')
            ->first();
        return $query;
    }

    public function loadBookingByUser($id){
        $query = Booking::query()
            ->where('user_id', $id)
            ->get();
        return $query;
    }
}
