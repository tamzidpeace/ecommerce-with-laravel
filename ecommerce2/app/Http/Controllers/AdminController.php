<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use App\Http\Request;
use Session;

session_start();


class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.admin_login');
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('tbl_admin')
            ->where('email', $email)
            ->where('password', $password)
            ->get();

        // echo "<pre>";
        // print_r($result);

        if(count($result) == 1) {
            return view('admin.dashboard');
        } else {
            Session::put('message', 'Email or Password Invalid');
            return back();
        }

        
    }
}
