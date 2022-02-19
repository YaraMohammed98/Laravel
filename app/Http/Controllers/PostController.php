<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'first post', 'posted_by' => 'Yara', 'created_at' => '2022-02-19 10:00:00'],
            ['id' => 2, 'title' => 'second post', 'posted_by' => 'Nada', 'created_at' => '2022-02-15 05:00:00'],
            ['id' => 3, 'title' => 'Third post', 'posted_by' => 'Merehan', 'created_at' => '2022-02-06 04:00:00'],

        ];
        // dd($posts); //to stop excution and dump the $posts
        return view('posts.index',[
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
 

    public function store()
    {
        //fetch request data
        $requestData = request()->all();
        //dd($requestData);
        // $createdData=['title' => $requestData['title'],'postCreator' => $requestData['post_creator'],'description' =>$requestData['description']];
        //store request data in db
        //redirection to posts.index
        // return to_route('posts.index'); in laravel 9 only
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $post = $this->getPostById($postId);
        return view('posts.show', [ 'post' => $post ]);
    }

    public function edit($postId)
    {
        $post = $this->getPostById($postId);
        return view('posts.edit', [ 'post' => $post ]);
    }

    public function update($postId)
    {
        return redirect()->route('posts.index');
    }


    public function getPostById($postId)
    {
        $postsData=[
            ['id' => 1, 'title' => 'first post', 'description' => 'Hello from first description', 'posted_by' => 'Yara', 'email' => 'Yara@gmail.com', 'created_at' => '2022-02-19 10:00:00'],
            ['id' => 2, 'title' => 'second post', 'description' => 'Hello from second description', 'posted_by' => 'Nada', 'email' => 'Nada@gmail.com', 'created_at' => '2022-02-15 05:00:00'],
            ['id' => 3, 'title' => 'third post', 'description' => 'Hello from third description', 'posted_by' => 'Merehan', 'email' => 'Merehan@gmail.com', 'created_at' => '2022-02-06 04:00:00']
        ];
        $posts =  $postsData;
        foreach ($posts as $post) {
            if ($post['id'] == $postId) {
                return $post;
            }
        }
    }
}

