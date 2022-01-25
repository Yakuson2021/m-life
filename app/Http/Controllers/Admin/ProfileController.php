<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('admin.profile.mypage-edit');
    }
    
    public function update()
    {
        return view('admin.profile.mypage-edit');
    }
    
    public function aboutus()
    {
        return view('admin.profile.aboutus');
    }
}
