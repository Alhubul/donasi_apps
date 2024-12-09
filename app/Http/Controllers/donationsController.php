<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class donationsController extends Controller
{
    public function index(){

        return view('admin.donations.index');
    }
}
