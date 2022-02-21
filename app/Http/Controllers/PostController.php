<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;  //using the model which connected to database
use Illuminate\Validation\Rules\Unique;

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
 

    public function store(PostRequest $request)
    {
        // //validation
        request()->validate([   //validata() take array of validation rules 
             'title' => ['required','min:3','unique:posts,title']    //value of title is array of validation rule
         ]); 

        //fetch request data
        $requestData = request()->all(); //data in page edit
        post::create([
            'title' => $requestData['title'],
            'description' =>$requestData['description'],
            'user_id' =>$requestData['post_creator'],
            //'created_at'=> Carbon::now()->toDateString()
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

    
    public function update($postId,PostRequest $request)
    {
         $post = post::find($postId);
         request()->validate([   //validata() take array of validation rules    
            'title' => [Rule::unique('posts')->ignore($post->id)]//ignore current record 
        ]);

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
