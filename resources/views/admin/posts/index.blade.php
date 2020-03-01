@extends('layouts.admin')



@section('content')

    <h1>Posts</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Role</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post</th>
            <th>Comments</th>
            <th>Com. numb</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <!-- ID -->
                    <td>{{$post->id}}</td>
                    <!-- Owner -->
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                    <!-- Role -->
                    <td>{{$post->user->role->name}}</td>
                    <!-- Category -->
                    <td>{{$post->category? $post->category->name : 'Uncategorized'}}</td>
                    <!-- Photo -->
                    <td><img height="45" src="{{ $post->photo? url($post->photo->file) : 'http://placehold.it/400x400' }}" alt=""></td>
                    <!-- Title -->
                    <td>{{$post->title}}</td>
                    <!-- Body -->
                    <td>{{str_limit($post->body,10)}}</td>
                    <!-- Post -->
                    <td><a href="{{route('post', $post->slug)}}">View Post</a> </td>
                    <!-- Comments -->
                    <td><a href="{{route('comments.show', $post->id)}}">View Comments</a> </td>
                    <!-- Comment DB -->
                    <td>{{count($post->comments)}}</td>
                    <!-- Created -->
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <!-- Updated -->
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                </tr>

            @endforeach
        @endif
        </tbody>

    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>


@stop