<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
public function sample() 
    {
    $prefs = config('pref');
    return view('sample')->with(['prefs' => $prefs]);
    }
}
