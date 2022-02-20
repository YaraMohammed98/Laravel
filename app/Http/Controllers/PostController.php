<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;  //using the model which connected to database

class PostController extends Controller
{
    public function index()
    {
        $posts = post::paginate(5);     //all() method exist in model retrive all data
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $users=User::all();
        return view('posts.create', [
            'users' =>$users
        ]);
    }
 

    public function store()
    {
        $now = Carbon::now();
        //fetch request data
        $requestData = request()->all(); //data in page edit
        post::create([
            'title' => $requestData['title'],
            'description' =>$requestData['description'],
            'user_id' =>$requestData['post_creator'],
            'created_at'=> Carbon::now()->toDateString()
        ]);
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $post = post::find($postId); // find() select data base on id(primary key)
        return view('posts.show', [ 'post' => $post ]);
    }

    public function edit($postId)
    {
        $users=User::all();
        $posts = post::find($postId);

        return view('posts.edit', [ 'posts' => $posts ,'users' =>$users
    ]);
    }

    public function update($postId)
    {
        $requestData = request()->all();
        Post::where('id', $postId)->update(['title'=>$requestData['title'],
         'description' =>$requestData['description'],
          'user_id' =>$requestData['post_creator']
        ]);
        return redirect()->route('posts.index');
    }


    public function destroy($postId)
    {
        post::where('id',$postId)->delete();
       // $post = post::find($postId); 
        //$post->delete();
        return redirect()->route('posts.index');
    }
}
