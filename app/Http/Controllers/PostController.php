<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' =>  'required',
            'description' => 'required'
        ]);
        $imageName = time().$request->image->getClientOriginalName();

        $request->image->move(public_path('images'), $imageName);

        $post       = new Post;
        $post->title = $request->title;
        $post->image = $imageName;
        $post->description = $request->description;
        $post->save();
        return redirect()->back()->with('message','Post Created successfully!');

    }

    public function list()
    {
        $posts  = Post::get();

        return view('list-post',compact('posts'));
    }

    public function edit($id)
    {
        $post  = Post::find($id);
        
        return view('edit-post',compact('post'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $post   = Post::find($request->id);

        if(isset($request->image)){
            $request->validate([
                'image' => 'required',
            ]);
            $imageName = time().$request->image->getClientOriginalName();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $post->image;
        }
        $post->title = $request->title;
        $post->image = $imageName;
        $post->description = $request->description;
        $post->save();
        return redirect()->back()->with('message','Post updated successfully!');
    }

    public function delete($id)
    {

        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post deleted successfully!');

    }

    public function deactivate($id)
    {
        $post = Post::find($id);
        $post->status = 1;
        $post->save();
        return redirect()->back()->with('message','Post deactivated successfully!');

    }

    public function activate($id)
    {
        $post = Post::find($id);
        $post->status = 0;
        $post->save();
        return redirect()->back()->with('message','Post Activated successfully!');

    }

    public function deletePosts()
    {
        $posts = Post::onlyTrashed()->get();
        return view('post-soft-delete',compact('posts'));
    }

    public function restorePost($id)
    {
        $post = Post::withTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message','Post restored successfully!');

    }

    public function restoreAll()
    {
        Post::withTrashed()->restore();
        return redirect()->back()->with('message','All Posts restored successfully!');

    }
}
