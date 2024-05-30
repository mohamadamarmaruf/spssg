<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function indexBaduta()
    {
        return view('tutorial.index');
    }
    public function indexBalita()
    {
        return view('tutorial.index-balita');
    }
}
