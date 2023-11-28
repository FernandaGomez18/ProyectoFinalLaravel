<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function artists()
    {
        return view('artists');
    }
    //
}
