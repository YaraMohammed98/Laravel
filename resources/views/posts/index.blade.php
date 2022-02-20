@extends('layouts.app')

@section('title') Index @endsection

@section('content')
        <div class="text-center mt-5">
            <a href="{{route('posts.create')}}" class="btn btn-success my-3">Create Post</a>

        </div>
        <table class="table my-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post['id']}}</th>
                    <td>{{$post['title']}}</td>
                    <td>{{ $post->user ?$post->user ->name:"Not Found" }}</td>
                    <td>{{$post['created_at']}}</td>
                    <td><a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a></td>
                    <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a></td>
                    
                    <form method="POST" action="{{route('posts.destroy' ,$post['id'])}}">
                    @csrf
                    @method('DELETE')
                    <td><button type="submit" class="btn btn-danger" onclick="return confirm('You are about to delete this post ,Are you sure')">Delete</button></td>
                    </form>

                </tr>
             

            @endforeach
            </tbody>
          </table>
          {{ $posts->links() }}
          
          @endsection