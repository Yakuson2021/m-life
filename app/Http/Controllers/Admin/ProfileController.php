<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        // User Modelからデータを取得する
        $user = User::find($request->id);
        return view('admin/profile/mypage-edit', ['user_form' => $user]);
    }
    
//         public function edit(Request $request)
//      {
//       // Post Modelからデータを取得する
//       $post = Post::find($request->id);
//       if (empty($post)) {
//         abort(404);    
//       }
//       return view('admin.movie.edit', ['post_form' => $post]);
//   }
    
    public function update()
    {
        return view('admin.profile.mypage-edit');
    }
    
    public function aboutus()
    {
        return view('admin.profile.aboutus');
    }
}
