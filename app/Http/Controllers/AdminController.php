<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Iluminacao\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
