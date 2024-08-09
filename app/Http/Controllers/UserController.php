<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('users.index');
    }

    public function rooms()
    {
        return view('users.room');
    }
    public function about()
    {
        return view('users.about');
    }
    public function blog()
    {
        return view('users.blog');
    }
    public function single_blog()
    {
        return view('users.single_blog');
    }
    public function elements()
    {
        return view('users.elements');
    }
    public function sign_in()
    {
        return view('users.sign_in');
    }
    public function sign_up()
    {
        return view('users.sign_up');
    }
}
