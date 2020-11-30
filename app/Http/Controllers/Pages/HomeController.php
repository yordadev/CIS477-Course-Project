<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function render()
    {
        // coding

        $data = [];
        
        return view('pages.home.index', [
            'data' => $data
        ]);
    }
}
