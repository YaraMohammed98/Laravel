<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=post::all();

        return $posts;
    }


    public function show($postId)
    {
        $post = post::find($postId);
        return $post;
    }

}
