<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }


    //單元練習< 練習6-1>  在 PostsController的 edit內取得舊資料
    public function edit($id)
    {
        $post=Post::find($id);
        $data=['post'=>$post];
        return view('admin.posts.edit',$data);
    }

    //單元練習< 練習6-5> 在 PostsController的 update內更新資料
    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }


//單元練習< 練習4-4> 設定 AdminPostsController對應的 function
//單元練習< 練習5-1> 將表單送過來的資料用 Model 寫入資料庫
//單元練習< 練習5-2>  設定頁面跳轉
    public function store(Request$request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    //單元練習< 練習7-3> 在 PostsController的 destroy內刪除資料
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }


}
