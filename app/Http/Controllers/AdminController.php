<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.index');
    }
    public function analytics()
    {
        return view('admin.analytics');
    }
    public function chat(){
        return view('admin.chat');
    }
    public function user_profile(){
        return view('admin.user_profile');
    }
};