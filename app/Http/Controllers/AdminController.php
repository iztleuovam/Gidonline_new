<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login() {
      return view('admin.login');
    }

    public function checkLogin(Request $request) {

      $request->validate([
          'username' => 'required',
          'password' => 'required'
      ]);

      if ($request->get('username') == 'admin' && $request->get('password') == '123456') {
        Session::put('admin', $request->get('username'));
        return redirect('/');
      }
      else {
        return view('admin.login');
      }
    }

    public function logout() {
      Session::forget('admin');
      return view('admin.login');
    }
}
