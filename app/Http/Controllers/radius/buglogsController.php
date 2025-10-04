<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class buglogsController extends Controller
{
    public function buglogs(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        $user_id = Session::get('user_id');
        return view('radius/buglogs', compact('user_id','user_name','roles_id','token'));
    }
}
