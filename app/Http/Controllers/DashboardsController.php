<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardsController extends Controller
{
    public function index()
    {
        // Retrieve user_id from the session
        $user_id = Session::get('user_id');
        $user_name = ucfirst(Session::get('user_name'));
        $user_balance = number_format(Session::get('user_balance'));
        $roles_id = ucfirst(Session::get('roles_id'));
        $firstname = ucfirst(Session::get('firstname'));
        $lastname = ucfirst(Session::get('lastname'));

        return view('pages.index', compact('user_id','user_name','user_balance','firstname','lastname','roles_id'));
    }

    public function index2()
    {
        return view('pages.index2');
    }

    public function index3()
    {
        return view('pages.index3');
    }

    public function index4()
    {
        return view('pages.index4');
    }

    public function index5()
    {
        return view('pages.index5');
    }

    public function index6()
    {
        return view('pages.index6');
    }

    public function index7()
    {
        return view('pages.index7');
    }

    public function index8()
    {
        return view('pages.index8');
    }

    public function index9()
    {
        return view('pages.index9');
    }

    public function index10()
    {
        return view('pages.index10');
    }

    public function index11()
    {
        return view('pages.index11');
    }

    public function index12()
    {
        return view('pages.index12');
    }
    
}
