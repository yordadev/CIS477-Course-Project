<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffingController extends Controller
{
    public function render()
    {
        return view("index");
    }
}
