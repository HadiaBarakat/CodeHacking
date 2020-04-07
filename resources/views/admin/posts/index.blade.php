@extends('layouts.admin')

@section('content')


    @if(Session::has('post_deleted'))
        <p class="bg-info">{{session('post_deleted')}}</p>
    @endif
    <h1>Posts</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>User Id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Image</th>
            <th>Categories</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user_id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td><img height="50" class="img-rounded"
                             src="{{$post->image ? $post->image->url : App\Image::$placeholderImage}}"
                    alt=""></td>
                    <td>
                        @foreach($post->categories as $category)
                            {{$category->name . ","}}
                        @endforeach
                    </td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}">Update</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>


@stop
