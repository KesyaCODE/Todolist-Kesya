<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function login() {
        return view('todo.beranda');
    }

    // method admin
    public function adminLogin() {
        return view('admin.beranda');
    }
}
