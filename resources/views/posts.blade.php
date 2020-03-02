
@extends('layouts.blog-post')



@section('content')




    <h1>Posts</h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Owner</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Title</th>

        <th>Post</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>

    <tbody>
    @if($posts)
        @foreach($posts as $post)

            <tr>
                <!-- ID -->

                <!-- Owner -->
                <td>{{$post->user->name}}</td>
                <!-- Role -->

                <!-- Category -->
                <td>{{$post->category? $post->category->name : 'Uncategorized'}}</td>
                <!-- Photo -->
                <td><img height="45" src="{{ $post->photo? url($post->photo->file) : 'http://placehold.it/400x400' }}" alt=""></td>
                <!-- Title -->
                <td>{{$post->title}}</td>
                <!-- Body -->
                
                <!-- Post -->
                <td><a href="{{route('post', $post->slug)}}">View Post</a> </td>
                <!-- Comments -->

                <!-- Comment DB -->

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