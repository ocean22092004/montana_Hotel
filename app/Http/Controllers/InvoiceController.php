<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    private $view;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->view = [];
    }

    public function index(){
        $objInvoice = new Invoice();
        $this->view['listInvoice'] = $objInvoice->loadListInvoice();
        return view('admin.invoice.index', $this->view);
    }

}
