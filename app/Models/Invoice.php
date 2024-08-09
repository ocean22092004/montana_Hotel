<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'booking_id',
        'invoice_number',
        'amount',
        'invoice_date',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function loadAllBooking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function loadAllInvoice()
    {
        $query = Invoice::query()->get();
        return $query;
    }

    public function loadListInvoice()
    {
        $query = Invoice::query()
            ->with('loadAllBooking')
            ->orderBy('id')
            ->paginate(5);
        return $query;
    }

    public function insertInvoiceWhenPay($booking_id, $amount){
        $params['booking_id'] = $booking_id;
        $params['invoice_number'] = 'HD'.$booking_id;
        $params['amount'] = $amount;
        $params['invoice_date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Invoice::query()->create($params);
        return $res;
    }

    public function getMonthlyAmounts($year)
    {
        // Truy vấn dữ liệu và tính tổng amount theo từng tháng
        $monthlyAmounts = DB::table('invoice')
            ->select(DB::raw('MONTH(invoice_date) as month'), DB::raw('SUM(amount) as total_amount'))
            ->whereYear('invoice_date', $year)
            ->groupBy(DB::raw('MONTH(invoice_date)'))
            ->orderBy(DB::raw('MONTH(invoice_date)'))
            ->get();

        // Tạo mảng với 12 phần tử, mỗi phần tử tương ứng với 1 tháng
        $amounts = array_fill(0, 12, 0);

        // Gán giá trị tổng amount vào mảng theo từng tháng
        foreach ($monthlyAmounts as $monthlyAmount) {
            $monthIndex = $monthlyAmount->month - 1; // Tháng trong MySQL bắt đầu từ 1, nhưng mảng bắt đầu từ 0
            $amounts[$monthIndex] = $monthlyAmount->total_amount;
        }

        return $amounts;
    }
}
