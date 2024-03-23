<?php

namespace App\Http\Controllers;

use App\Models\Knowledgebase;
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
        $data = Knowledgebase::select('id', 'isi_kb as knowledgebase')->get();
        return view('landingpage.ask_ai', [
            'title' => 'Tanya AI',
            'knowledgebase' => json_encode($data)
        ]);
    }
}
