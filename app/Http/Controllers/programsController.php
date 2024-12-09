<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class programsController extends Controller
{
    public function index()
    {
        return view('admin.programs.index');
    }
}
