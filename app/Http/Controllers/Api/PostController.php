<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=post::all();

        return new PostResource($posts);;
    }


    public function show($postId)
    {
        $post = post::find($postId);
        return new PostResource($post); //object from resource
    }


    public function store(PostRequest $request)
    {
        request()->validate([   //validata() take array of validation rules 
            'title' => ['required','min:3','unique:posts,title']    //value of title is array of validation rule
        ]); 

        $requestData=request()->all();
        $post=post::create($requestData);
        return new PostResource($post);;
    }
}
