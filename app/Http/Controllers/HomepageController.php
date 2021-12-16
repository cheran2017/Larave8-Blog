<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomepageController extends Controller
{
    public function homepage()
    {
        $posts = Post::where('status',0)->paginate(6);
        return view('homepage',compact('posts'));
    }

    public function details($id)
    {
        $post = Post::find($id);
        return view('details',compact('post'));
    }
}
