<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    //
    public function index()
    {
        return view('landingpage.index', [
            'title' => 'Landing Page'
        ]);
    }

    public function ask_ai()
    {
        return view('landingpage.ask_ai', [
            'title' => 'Tanya AI'
        ]);
    }
}
