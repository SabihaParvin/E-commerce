<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
       
        return view('admin.pages.home');
    }
}
