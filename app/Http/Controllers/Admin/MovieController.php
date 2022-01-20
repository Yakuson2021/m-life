<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
  public function add(Request $request)
    {
      return view('admin/movie/post');
    }
  public function index(Request $request)
  {
      return view('admin.movie.index');
  }
}